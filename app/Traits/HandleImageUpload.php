<?php


namespace App\Traits;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HandleImageUpload
{

    /**
     * @param $input
     * @param $folder
     * @param $oldPicture
     * @return false|string|null
     */
    public function upsertModelImage($input, $folder, $oldPicture = null)
    {
        // if there is no input, returns null
        if (!$input) {
            return null;
        }

        // gets the extension and the original file name
        $extension = $input->getClientOriginalExtension();
        $name = pathinfo($input->getClientOriginalName(), PATHINFO_FILENAME);

        // sanitize file name and prefixes it with an random string
        $filename = strtolower(Str::random(9) . '_' . Str::slug($name, '_') . '.' . $extension);

        // defines the finale path with year and month
        $this_month = now()->format('Y-m');
        $path = Storage::putFileAs("{$folder}/{$this_month}", new File($input), $filename);

        // if old picture has been passed, is going to be deleted
        if ($oldPicture) {
            Storage::delete($oldPicture); // removes the old picture
        }

        return $path;
    }


    /**
     * Given:
     *      -A father, the object that the gallery is related to
     *      -A request containing:
     *           -gallery_remove (can be not present) a string of ids of the gallery elements to remove, separated by a comma (eg. [45,34,22])
     *           -gallery (can be not present) a list of images files to save
     *           -gallery_titles (must be present if gallery is present) a list of the titles of the images to save. Here the index of the title in the array MUST be the
     *               same of the correspondig image.
     *      -A relation name, the name of the hasMany relation on the father model
     *      -A folder in witch the files will be saved
     *
     * Removes from db and from the Storage all the galleries present in gallery_remove
     * Adds to the father (relationId) all the files presents in gallery parameter of the request with the given titles.
     *
     * @param $father
     * @param $relation
     * @param $request
     * @param $folder
     *
     * @return void.
     */
    public function upsertImagesGallery($father, $relation, $request, $folder)
    {

        /**
         * From the father object gets the already existing galley, the name of the foreignKey that links
         * the gallery to the father and the name of the Model class rappresenting a gallery element on db.
         */
        $existingGallery = $father->$relation;
        $relationName = $father->$relation()->getForeignKeyName();
        $galleryModel = '\\' . get_class($father->$relation()->getRelated());


        /**
         * Remove galleries in gallery_remove
         */
        $this->removeGalleries($existingGallery, $request);

        /**
         * Creates new galleries in gallery parameter of the request
         */
        $this->createNewGalleries($galleryModel, $request, $folder, $relationName, $father->getKey());
    }





    /**
     * PRIVATE FUNCTOINS
     */





    /**
     * Given the existing Gallery as an array of galleries and a request containing a
     * 'gallery_remove' element as a string of gallery ids, separated by a comma (eg. [45,34,22])
     * the elements of the gallery list corresponding to one of those ids will be removed from db
     * and the linked image (if its not the default empty image) will be deleted from storage
     *
     * @param $existingGallery
     * @param $request
     */
    private function removeGalleries($existingGallery, $request)
    {

        if (!array_key_exists('gallery_remove', $request)) {
            return;
        }

        /**
         * Check the remove string is not empty
         */
        $toRemoveString = $request['gallery_remove'];
        if ($toRemoveString === "") {
            return;
        }

        /**
         * Remove every element found on the 'gallery_remove' string
         */
        $toRemoveArray = explode(",", $toRemoveString);
        foreach ($toRemoveArray as $toRemoveElement) {
            $this->removeElementFromGallery($existingGallery, $toRemoveElement);
        }
    }





    /**
     * Given the existing Gallery as an array of galleries and an id of a element of thet list,
     * if the gallery element is actually in the list that element will be removed from db
     * and the linked image (if its not the default empty image) will be deleted from storage.
     * Also the $existingGallery is modified removing the elements.
     *
     * @param $existingGallery
     * @param $toRemoveElement
     */
    private function removeElementFromGallery($existingGallery, $toRemoveElement)
    {
        /**
         * Find gallery element
         */
        $galleryElement = $this->findGalleryById($existingGallery, $toRemoveElement);

        /**
         * if the element is found delete the image from the storage,
         * if it is not the default empty.png, and delete the gallery element from db.
         */
        if (!is_null($galleryElement)) {
            if (strcmp($galleryElement->image, "empty.png")) {
                Storage::delete($galleryElement->image);
            }
            $galleryElement->delete();
        }
    }





    /**
     * Given a gallery, as an array of objects that has an id propriety, finds and returns the
     * one with the given id, returns null if it is not found.
     *
     * @param $gallery
     * @param $id
     */
    private function findGalleryById($gallery, $id)
    {
        foreach ($gallery as $index => $element) {
            if ($element->id == $id) {
                $gallery->forget($index);
                return $element;
            }
        }
        return null;
    }




    /**
     * Given the request containing a 'gallery' attribute as an array of files, creates a gallery element of each one of them.
     * Every item will have a title, that is in the gallery_titles attribute of the request. For a image file in the gallery it will be taken
     * the title with the same index of the gallery in the gallery_titles list
     *
     * @param $galleryModel
     * @param $request
     * @param $folder
     * @param $relationName
     * @param $relationId
     */
    private function createNewGalleries($galleryModel, $request, $folder, $relationName, $relationId)
    {
        /**
         * Check if there is any image
         */
        if (!array_key_exists('gallery', $request)) {
            return;
        }

        $galleriesFiles = $request['gallery'];
        $galleryTitles = $request['gallery_titles'];

        /**
         * Creates a gallery element for each image
         */
        foreach ($galleriesFiles as $index => $file) {
            $this->createGalleryElement($file, $index, $galleryTitles, $folder, $galleryModel, $relationName, $relationId);
        }
    }

    /**
     * Given a files, creates a gallery element for that file.
     * The gallery element will have a title, that is in the gallery_titles attribute of the request. The title il the one found in the galleryTitles array
     * in the given galleryElementIndex position
     *
     *
     * @param $galleryElementFile
     * @param $galleryElementIndex
     * @param $galleryTitles
     * @param $folder
     * @param $galleryModel
     * @param $relationName
     * @param $relationId
     */
    private function createGalleryElement($galleryElementFile, $galleryElementIndex, $galleryTitles, $folder, $galleryModel, $relationName, $relationId)
    {

        /**
         * Gets the title, if null returns.
         */
        $galleryElementTitle = $galleryTitles[$galleryElementIndex];

        if ($galleryElementTitle == null) {
            return;
        }

        /**
         * Insert the image in the storage and gets the absolute path.
         */
        $galleryElementImagePath = $this->upsertModelImage($galleryElementFile, $folder);

        /**
         * Generate the Gallery object to save
         */
        $galleryObject = $this->generateGalleryObject($galleryElementTitle, $galleryElementImagePath, $relationName, $relationId);


        /**
         * Save the gallery on db.
         */
        $galleryModel::create($galleryObject);
    }

    /**
     * Generates a Gallery element to save in db.
     *
     *
     * @param $galleryElementTitle
     * @param $galleryElementImagePath
     * @param $relationName
     * @param $relationId
     */
    private function generateGalleryObject($galleryElementTitle, $galleryElementImagePath, $relationName, $relationId)
    {
        return  [
            'title' => $galleryElementTitle,
            'image' => $galleryElementImagePath,
            $relationName => $relationId
        ];
    }
}

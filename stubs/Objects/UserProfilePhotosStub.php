<?php

namespace alexshadie\TelegramBot\Objects;

use alexshadie\TelegramBot\Type\PhotoSizeStub;

/**
 * Stub for UserProfilePhotos class. Use it for testing.
 */
class UserProfilePhotosStub extends UserProfilePhotos
{
    /**
     * @return UserProfilePhotos
     */
    public static function getUserProfilePhotosWithCommonFields1(): UserProfilePhotos
    {
        return new UserProfilePhotos(
            1216826946,
            [PhotoSizeStub::getPhotoSizeWithCommonFields2()]
        );
    }
    /**
     * @return UserProfilePhotos
     */
    public static function getUserProfilePhotosWithCommonFields2(): UserProfilePhotos
    {
        return new UserProfilePhotos(
            788697725,
            [PhotoSizeStub::getPhotoSizeWithCommonFields1()]
        );
    }
    /**
     * @return UserProfilePhotos
     */
    public static function getUserProfilePhotosWithCommonFields3(): UserProfilePhotos
    {
        return new UserProfilePhotos(
            1383618702,
            [PhotoSizeStub::getPhotoSizeWithCommonFields1()]
        );
    }
    /**
     * @return UserProfilePhotos
     */
    public static function getUserProfilePhotosWithAllFields1(): UserProfilePhotos
    {
        return new UserProfilePhotos(
            73848416,
            [PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields3()]
        );
    }
    /**
     * @return UserProfilePhotos
     */
    public static function getUserProfilePhotosWithAllFields2(): UserProfilePhotos
    {
        return new UserProfilePhotos(
            579155440,
            [PhotoSizeStub::getPhotoSizeWithCommonFields3()]
        );
    }
    /**
     * @return UserProfilePhotos
     */
    public static function getUserProfilePhotosWithAllFields3(): UserProfilePhotos
    {
        return new UserProfilePhotos(
            110253930,
            [PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields2()]
        );
    }
}

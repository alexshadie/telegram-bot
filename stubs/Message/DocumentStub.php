<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Type\PhotoSizeStub;

/**
 * Stub for Document class. Use it for testing.
 */
class DocumentStub extends Document
{
    /**
     * @return Document
     */
    public static function getDocumentWithCommonFields1(): Document
    {
        return new Document(
            'f2gCxBvNRF'
        );
    }
    /**
     * @return Document
     */
    public static function getDocumentWithCommonFields2(): Document
    {
        return new Document(
            'sSVUgUseOI'
        );
    }
    /**
     * @return Document
     */
    public static function getDocumentWithCommonFields3(): Document
    {
        return new Document(
            'VNgEHMEThV'
        );
    }
    /**
     * @return Document
     */
    public static function getDocumentWithAllFields1(): Document
    {
        return new Document(
            'aUEwdDxwYh',
            PhotoSizeStub::getPhotoSizeWithCommonFields2(),
            'YBj2xq1vDK',
            'B1FkCWucdK',
            1366829509
        );
    }
    /**
     * @return Document
     */
    public static function getDocumentWithAllFields2(): Document
    {
        return new Document(
            'wpARPo9HHy',
            PhotoSizeStub::getPhotoSizeWithCommonFields1(),
            'CRQnfqtUex',
            'jbdV5jcnfH',
            1950171217
        );
    }
    /**
     * @return Document
     */
    public static function getDocumentWithAllFields3(): Document
    {
        return new Document(
            'HCJxQFl3cv',
            PhotoSizeStub::getPhotoSizeWithCommonFields2(),
            'ExXsftyTMP',
            'VSlkXJmgAp',
            932818937
        );
    }
}

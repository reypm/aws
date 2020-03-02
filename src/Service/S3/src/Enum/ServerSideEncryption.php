<?php

namespace AsyncAws\S3\Enum;

class ServerSideEncryption
{
    public const AES256 = 'AES256';
    public const AWS_KMS = 'aws:kms';

    public static function exists(string $value): bool
    {
        $values = [
            self::AES256 => true,
            self::AWS_KMS => true,
        ];

        return isset($values[$value]);
    }
}

<?php /** @noinspection PhpComposerExtensionStubsInspection */


namespace Core\Helpers;


use JsonSerializable;

trait JsonSerializableTrait
{
    /** @noinspection PhpComposerExtensionStubsInspection */
    public function toArray(): array
    {
        $arr  = get_object_vars($this);
        $data = [];
        array_walk($arr, static function ($v, $k) use (&$data) {
            if ($v instanceof JsonSerializable) {
                $v = $v->jsonSerialize();
            }

            $data[$k] = $v;
        });

        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
# 이해부족....

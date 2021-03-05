<?php


namespace App\Services\ReadData\Helper;


class FormatHelper
{
    public function formatDefault($data)
    {
        return explode(',', trim($data));
    }

    public function items($data)
    {
        preg_match_all("/\[([^\]]*)\]/", $data, $matches);

        $explodeTraits = explode('-', $matches[1][0]);

        foreach ($explodeTraits as $key => $explodeTrait) {
            $explodeTraits[$key] = explode(';', $explodeTrait);
        }

        return $explodeTraits;
    }

    public function sale($data)
    {
        return explode(',', trim(preg_replace('/\[.*\],/', '', $data)));
    }
}

<?php

namespace Database\Seeders;

use File;
use Exception;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ScenerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->now = Carbon::now();
        $this->uploadPrivateSceneries();
        $this->uploadPublicSceneries();
    }

    private function uploadPrivateSceneries()
    {
        $inserts = [];
        $disk = Storage::disk('game_private_sceneries');
        $files = $disk->files();
        foreach ($files as $file) {
            if (str_contains($file, '.xml')) {
                $path = $disk->path($file);
                $xmlContent = $this->getXmlContent($path);
                if ($xmlContent) {
                    $swfFileName = str_replace(".xml", ".swf", $file);
                    $filePath = "static/dswmedia/escenarios/privados/{$swfFileName}";
                    $inserts[] = $this->prepareDataPrivate($file, $xmlContent, $filePath);
                }
            }
        }

        $this->insert($inserts);
    }

    private function uploadPublicSceneries()
    {
        $inserts = [];
        $disk = Storage::disk('game_public_sceneries');
        $files = $disk->files();
        foreach ($files as $file) {
            if (str_contains($file, '.xml')) {
                $path = $disk->path($file);
                $xmlContent = $this->getXmlContent($path);
                if ($xmlContent) {
                    $swfFileName = str_replace(".xml", ".swf", $file);
                    $filePath = "static/dswmedia/escenarios/publicos/{$swfFileName}";
                    $inserts[] = $this->prepareDataPublic($file, $xmlContent, $filePath);
                }
            }
        }

        $inserts[] = $this->insertBrokenScenery1();

        $this->insert($inserts);
    }

    private function insertBrokenScenery1()
    {
        return [
            'param_scenary_type_id' => 128,
            'name' => "escenario1",
            'file_name' => "escenario1",
            'file_path' => "static/dswmedia/escenarios/publicos/escenario1.swf",
            'bit_map' => refactorBitMap("1111111111111111111111111111
            1111111111111111111111111111
            1111111111111111111111111111
            1111111111111111111111111111
            1111111111111111111111111111
            1111111111111111111111111111
            1111111111111111111111111111
            1111111110111111111111111111
            1111111100001111111111111111
            1111111000000001111111111111
            1111110000000000111111111111
            1111100000000000011111111111
            1111000000000000001111111111
            1110000000000000000111111111
            1110000000000000011111111111
            1111000000000000011111111111
            1111100000000000001111111111
            1111110000000000001111111111
            1111111000000000011111111111
            1111111100000000111111111111
            1111111110000001111111111111
            1111111111000011111111111111
            1111111111100111111111111111
            1111111111111111111111111111
            1111111111111111111111111111
            1111111111111111111111111111"),
            'parameter' => 1,
            'created_at' => $this->now,
        ];
    }

    private function insert($inserts)
    {
        DB::table('sceneries')->insert($inserts);
    }

    private function prepareDataPrivate($file, $xmlContent, $filePath)
    {
        $parameter = str_replace(".xml", "", $file);
        $parameter = str_replace("privado", "", $parameter);
        return [
            'param_scenary_type_id' => 127,
            'name' => $xmlContent['nameScene']['@attributes']['name'],
            'file_name' => str_replace(".xml", "", $file),
            'file_path' => $filePath,
            'bit_map' => $this->makeBitMap($xmlContent['matrix']['row']),
            'parameter' => $parameter,
            'created_at' => $this->now,
        ];
    }

    private function prepareDataPublic($file, $xmlContent, $filePath)
    {
        $parameter = str_replace(".xml", "", $file);
        $parameter = str_replace("escenario", "", $parameter);
        return [
            'param_scenary_type_id' => 128,
            'name' => str_replace(".xml", "", $file),
            'file_name' => str_replace(".xml", "", $file),
            'file_path' => $filePath,
            'bit_map' => $this->makeBitMap($xmlContent['matrix']['row']),
            'parameter' => $parameter,
            'created_at' => $this->now,
        ];
    }

    private function makeBitMap($rows)
    {
        $response = "";
        foreach ($rows as $row) {
            $rowData = str_replace(", ", "", $row['@attributes']['data']);
            $response .= $rowData . "\r\n";
        }

        return $response;
    }

    private function getXmlContent($path)
    {
        try {
            $xmlString = file_get_contents($path);
            $xmlObject = simplexml_load_string($xmlString);

            $json = json_encode($xmlObject);
            return json_decode($json, true);
        } catch (Exception $e) {
            dump("A file error has occurred: {$path}");
            return null;
        }
    }
}

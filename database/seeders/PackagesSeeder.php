<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Planning Package 1',
            'work_name_id' => '1',
            'we_provide' => 'Details of Your requirement',
            'we_deliver' => 'Planning in DWG Format',
            'rate_id' => '[\"1\",\"2\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Structure Package 1',
            'work_name_id' => '2',
            'we_provide' => '1.plan in AUTOCAD compatible format\r\n2. Soil test report',
            'we_deliver' => 'Detailing of structural element in Tabular Format',
            'rate_id' => '[\"3\",\"4\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Structure Package 2',
            'work_name_id' => '2',
            'we_provide' => '1.Plan in AutoCAD compatible format\r\n2.Soil test report',
            'we_deliver' => '1.Detailing of structural element in \'L\' Cross Section Format\r\n2. Complete analysis & design calculation',
            'rate_id' => '[\"5\",\"6\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => '3D Floor Plannig Package 1',
            'work_name_id' => '3',
            'we_provide' => 'Plan in AutoCAD compatible format',
            'we_deliver' => '3D Floor Planning in JPEG Format',
            'rate_id' => '[\"7\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Interior Package 1',
            'work_name_id' => '5',
            'we_provide' => 'Plan in AutoCAD Format',
            'we_deliver' => '1. Flooring Layout\r\n2. Sanitary Layout\r\n3.Ceilings Layout\r\n4. Walls Elevation\r\n5. Furniture Layout\r\n6. Electrification Layout',
            'rate_id' => '[\"8\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' =>'Interior Package 2',
            'work_name_id' => '5',
            'we_provide' => 'Plan in AutoCAD compatible format',
            'we_deliver' => 'Above all with 3D Views/Interactive View', 
            'rate_id' =>  '[\"9\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' =>  'Interior Package 3',
            'work_name_id' => '5',
            'we_provide' =>  'Plan in AutoCAD compatible format',
            'we_deliver' =>  'Only 3D Views/ Interactive Views',
            'rate_id' => '[\"10\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' =>  'Interior Package 4',
            'work_name_id' => '5',
            'we_provide' =>  'Plan, Walls Elevation, Ceiling & Flooring Layout in AutoCAD compatible format',
            'we_deliver' => 'Only 3D Views/ Interactive View', 
            'rate_id' => '[\"11\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' =>  'Package 1', 
            'work_name_id' => '7',
            'we_provide' =>  'Site Plan, Elevations in AutoCAD compatible format',
            'we_deliver' =>  'HD 1280',
            'rate_id' => '[\"12\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Package 2',
            'work_name_id' => '7',
            'we_provide' => 'Site Plan, Elevations in AutoCAD compatible format',
            'we_deliver' =>  'Full HD 1920', 
            'rate_id' => '[\"13\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Working Drawings Package 1',
            'work_name_id' => '6',
            'we_provide' => 'Plan & Elevation',
            'we_deliver' =>  '1. Structure drawings that includes:
                            (i) Column layout
                            (ii) Center line
                            (iii) Footing plan
                            (iv) Footing and column details
                            (v) Ground and plinth beam
                            (vi) Plinth slab
                            (vii) Roof beam plan
                            (viii) RCC water storage tank
                            (ix) Staircase
                            2. Plumbing
                            3. Drainage line
                            4. Door & windows plan
                            5. Door & windows schedule
                            6. Electrical drawing that include:
                            (i) Roof electrical
                            (ii) Wall electrical
                            7. Working plan
                            8. Elevation working detals', 
            'rate_id' => '[\"14\",\"15\",\"16\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Exterior Package 1',
            'work_name_id' => '4',
            'we_provide' => 'Plan & Elevation',
            'we_deliver' =>  '3D View', 
            'rate_id' => '[\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Exterior Package 2',
            'work_name_id' => '4',
            'we_provide' => 'Plan',
            'we_deliver' =>  'One 2D Elevation & one 3D View / Interactive View', 
            'rate_id' => '[\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"33\",\"34\",\"35\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Exterior Package 3',
            'work_name_id' => '4',
            'we_provide' => 'Plan',
            'we_deliver' =>  'Two 2D Elevations & Two 3D Views / Interactive Views', 
            'rate_id' => '[\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('packages')->insert([
            'Plannig_package_name' => 'Exterior Package 4',
            'work_name_id' => '4',
            'we_provide' => 'Plan',
            'we_deliver' =>  'Two 2D Elevations & One 3D View / Interactive View', 
            'rate_id' => '[\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\"]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

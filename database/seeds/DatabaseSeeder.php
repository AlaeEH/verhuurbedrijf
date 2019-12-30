
<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('products')->insert([
        	'title' => 'Pantsir S1',
        	'description' => 'The Pantsir missile system was a family of self-propelled, medium-range surface-to-air missile systems. Pantsir-S1 is the first version and is a combined short to medium range surface-to-air missile and anti-aircraft artillery weapon system produced by KB',
        	'long_description' => 'Its purpose is the protection of civil and military point and area targets, for motorised or mechanised troops up to regimental size or as defensive asset of higher ranking air defence systems like S-300/S-400. The system has capability for anti-munitions missions. It can hit targets on the waterline/above-water. It can operate in a fully automatic mode. It has the ability to work in a completely passive mode. The probability of hitting a target for 1 rocket is not less than 0.7 with a reaction time of 4–6 seconds.It can fire missiles and gun armament while in motion. For its main radar station, early detection in height may be between 0-60° or 26-82° depending on the mode. The system has claimed significant advantages over other systems, such as Crotale NG (France), Roland-3 (France + USA), Rapier 2000 (UK), SeaRAM (Germany + USA). This is not confirmed by comparative testing, but clearly follows from declared limit of possibilities of systems (2010). In 2013, there was a variant with two radar stations for early detection standing back to back. The system has a modular structure which enables a fast and easy replacement of any part.',
        	'product_image' => 'pantsir.jpg',
        	'in_stock' => '100',
        	'price' => '37153',
        	'status' => '1',
        ]);

        DB::Table('products')->insert([	
        	'title' => 'F-16 Fighting Falcon',
        	'description' => 'TThe General Dynamics F-16 Fighting Falcon is a single-engine supersonic multirole fighter aircraft originally developed by General Dynamics.',
        	'long_description' => 'The Fighting Falcon\'s key features include a frameless bubble canopy for better visibility, side-mounted control stick to ease control while maneuvering, an ejection seat reclined 30 degrees from vertical to reduce the effect of g-forces on the pilot, and the first use of a relaxed static stability/fly-by-wire flight control system which helps to make it a nimble aircraft. The F-16 has an internal M61 Vulcan cannon and 11 locations for mounting weapons and other mission equipment. The F-1\'s official name is "Fighting Falcon", but "Viper" is commonly used by its pilots and crews, due to a perceived resemblance to a viper snake as well as the Colonial Viper starfighter on Battlestar Galactica which aired at the time the F-16 entered service.',
        	'product_image' => 'voorlogo.jpg',
        	'in_stock' => '100',
        	'price' => '23723',
        	'status' => '1',
        ]);

        DB::Table('products')->insert([
        	'title' => 'Challenger 2',
        	'description' => 'The FV4034 Challenger 2 (MOD designation "CR2") is a third generation British main battle tank (MBT) in service with the armies of the United Kingdom and Oman.',
        	'long_description' => 'The Challenger 2 has a four-man crew. The turret and hull are protected with second generation Chobham armour (also known as Dorchester). On one occasion, in August 2006, during the post-invasion stage of the Iraq War, an RPG-29 was fired at a Challenger 2 that was climbing over a ramp. The armour on its front underside hull, which was augmented with an explosive reactive armour package, was damaged, injuring several crew members. The tank subsequently returned to base under its own power and was quickly repaired and back on duty the following day. As a response to the incident, the explosive reactive armour package was replaced with a Dorchester block and the steel underbelly lined with armour as part of the Streetfighter upgrade. To date, the only time the tank has been seriously damaged during operations was by another Challenger 2 in a blue on blue (friendly fire) incident at Basra in 2003 when the damaged tank had its hatch open at the time of the incident.',
        	'product_image' => 'challanger 2.jpg',
        	'in_stock' => '100',
        	'price' => '2133241',
        	'status' => '1',
        ]);

        DB::Table('products')->insert([
        	'title' => 'Lockheed F-117 Nighthawk',
        	'description' => 'The Lockheed F-117 Nighthawk is an American single-seat, twin-engine stealth attack aircraft that was developed by Lockheeds secretive Skunk Works division and operated by the United States Air Force (USAF).',
        	'long_description' => 'The F-117 was born after combat experience in the Vietnam War when increasingly sophisticated Soviet surface-to-air missiles (SAMs) downed heavy bombers. It was a black project, an ultra-secret program for much of its life: very few people in the Pentagon knew the program even existed, until the F-117s were revealed to the public in 1988. The project began in 1975 with a model called the "Hopeless Diamond" (a wordplay on the Hope Diamond because of its appearance). The following year, the Defense Advanced Research Projects Agency (DARPA) issued Lockheed Skunk Works a contract to build and test two Stealth Strike Fighters, under the code name "Have Blue". These subscale aircraft incorporated jet engines of the Northrop T-38A, fly-by-wire systems of the F-16, landing gear of the A-10, and environmental systems of the C-130. By bringing together existing technology and components, Lockheed built two demonstrators under budget, at $35 million for both aircraft, and in record time.',
        	'product_image' => 'f-117-nighthawk.jpg',
        	'in_stock' => '100',
        	'price' => '879999',
        	'status' => '1',
        ]);

        DB::Table('users')->insert([
            'first_name' => env('SEEDER_USER_FIRST_NAME', 'John'),
            'last_name' => env('SEEDER_USER_LAST_NAME', 'Doe'),
            'email' => env('SEEDER_USER_EMAIL', '0312hani@gmail.com'),
            'password' => Hash::make((env('SEEDER_USER_PASSWORD', 'password'))),
        ]);
    }
}
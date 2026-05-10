<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        $plants = [

            [
                'name' => 'Neem',
                'scientific_name' => 'Azadirachta indica',
                'category' => 'Tree • Medicinal',
                'uses' => 'Traditionally used for antibacterial and skin-related treatments.',
                'description' => 'A medicinal tree widely used in Ayurvedic and Hela-Veda systems.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/20/Neem_%28Azadirachta_indica%29_in_Hyderabad_W_IMG_6976.jpg',
                'qr_url' => url('/plants/1'),

                'conservation_status' => 'Least Concern',
                'is_endemic' => false,
                'habitat' => 'Dry Zone Forest',

                'ayurveda_uses' => 'Used in detoxification and skin purification treatments.',
                'cultural_significance' => 'Important in traditional Sri Lankan herbal medicine systems.',

                'active_compounds' => 'Azadirachtin, flavonoids',
                'research_notes' => 'Studied for antimicrobial and pesticidal properties.',
                'studied_by' => 'University of Colombo',

                'ecological_role' => 'Supports pollinators and insect biodiversity',
                'associated_wildlife' => 'Butterflies, bees, birds',

                'garden_zone' => 'Medicinal Section A1',
                'gps_coordinates' => '6.8421,79.8732',
            ],

            [
                'name' => 'Entada',
                'scientific_name' => 'Entada rheedii Spreng.',
                'category' => 'Medicinal Climber',
                'uses' => 'Traditionally used in herbal remedies and seed-based treatments.',
                'description' => 'Large-seeded tropical climber used in traditional medicine.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/95/Entada_rheedii05.jpg',
                'qr_url' => url('/plants/2'),

                'conservation_status' => 'Least Concern',
                'is_endemic' => false,
                'habitat' => 'Lowland rainforest',

                'ayurveda_uses' => 'Used in traditional neurological and digestive remedies.',
                'cultural_significance' => 'Used in South Asian folk medicine.',

                'active_compounds' => 'Saponins, flavonoids',
                'research_notes' => 'Potential neuropharmacological properties observed.',
                'studied_by' => 'Ethnobotanical research',

                'ecological_role' => 'Supports forest canopy structure',
                'associated_wildlife' => 'Insects, birds',

                'garden_zone' => 'Climber Section B2',
                'gps_coordinates' => null,
            ],

            [
                'name' => 'Weniwel',
                'scientific_name' => 'Coscinium fenestratum (Gaertn.) Colebr.',
                'category' => 'Medicinal Vine',
                'uses' => 'Used in Ayurveda for diabetes and detoxification.',
                'description' => 'Yellow-stemmed medicinal vine used in Sri Lankan Ayurveda.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/7/73/Coscinium_Fenestratum_02.JPG',
                'qr_url' => url('/plants/3'),

                'conservation_status' => 'Vulnerable',
                'is_endemic' => false,
                'habitat' => 'Wet Zone Rainforest',

                'ayurveda_uses' => 'Used for blood purification and metabolic disorders.',
                'cultural_significance' => 'Highly valued in Sri Lankan traditional medicine.',

                'active_compounds' => 'Berberine',
                'research_notes' => 'Strong antimicrobial activity observed.',
                'studied_by' => 'University of Colombo',

                'ecological_role' => 'Supports climbing forest biodiversity',
                'associated_wildlife' => 'Butterflies, birds',

                'garden_zone' => 'Medicinal Vine Section A2',
                'gps_coordinates' => null,
            ],

            [
                'name' => 'Lagerstroemia',
                'scientific_name' => 'Lagerstroemia speciosa (L.) Pers.',
                'category' => 'Medicinal Tree',
                'uses' => 'Used for blood sugar regulation and wellness support.',
                'description' => 'Flowering tree known for medicinal leaf extracts.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/a/af/0049Lagerstroemia_speciosa_40.jpg',
                'qr_url' => url('/plants/4'),

                'conservation_status' => 'Least Concern',
                'is_endemic' => false,
                'habitat' => 'Wet Zone / Cultivated',

                'ayurveda_uses' => 'Used for metabolic balance and diabetes support.',
                'cultural_significance' => 'Widely used in Asian herbal medicine.',

                'active_compounds' => 'Corosolic acid',
                'research_notes' => 'Studied for glucose regulation effects.',
                'studied_by' => 'Pharmacological institutes',

                'ecological_role' => 'Supports pollinator ecosystems',
                'associated_wildlife' => 'Bees, butterflies',

                'garden_zone' => 'Medicinal Tree Section A3',
                'gps_coordinates' => null,
            ],

            [
                'name' => 'Adhatoda',
                'scientific_name' => 'Justicia adhatoda L.',
                'category' => 'Medicinal Shrub',
                'uses' => 'Used for asthma and respiratory disorders.',
                'description' => 'Evergreen shrub used in cough and bronchial treatments.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/c/cb/Justicia_adhatoda_L._%2852560320822%29.jpg',
                'qr_url' => url('/plants/5'),

                'conservation_status' => 'Least Concern',
                'is_endemic' => false,
                'habitat' => 'Dry / Intermediate Zones',

                'ayurveda_uses' => 'Used in cough syrups and respiratory treatments.',
                'cultural_significance' => 'Common household medicinal plant in Sri Lanka.',

                'active_compounds' => 'Vasicine',
                'research_notes' => 'Bronchodilator properties confirmed.',
                'studied_by' => 'Ayurvedic pharmacology',

                'ecological_role' => 'Supports insect biodiversity',
                'associated_wildlife' => 'Bees, butterflies',

                'garden_zone' => 'Medicinal Shrub Section B1',
                'gps_coordinates' => null,
            ],

            [
                'name' => 'Rauvolfia',
                'scientific_name' => 'Rauvolfia verticillata (Lour.) Baill.',
                'category' => 'Medicinal Plant',
                'uses' => 'Used for calming and blood pressure regulation.',
                'description' => 'Medicinal plant used for nervous system support.',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/9e/Rauvolfia_verticillata_%28Lour.%29_Baill._-_53768228056.jpg',
                'qr_url' => url('/plants/6'),

                'conservation_status' => 'Near Threatened',
                'is_endemic' => false,
                'habitat' => 'Wet Zone Forest',

                'ayurveda_uses' => 'Used for hypertension and calming treatments.',
                'cultural_significance' => 'Traditional calming herb in Ayurveda.',

                'active_compounds' => 'Reserpine',
                'research_notes' => 'Antihypertensive effects studied.',
                'studied_by' => 'Medical research institutions',

                'ecological_role' => 'Supports understory ecosystems',
                'associated_wildlife' => 'Forest insects',

                'garden_zone' => 'Medicinal Section A4',
                'gps_coordinates' => null,
            ],
        ];

        foreach ($plants as $plant) {
            Plant::updateOrCreate(
                ['name' => $plant['name']],
                $plant
            );
        }
    }
}

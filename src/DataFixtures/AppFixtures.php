<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }



    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('FR-fr');

        // User Management
        $genres = ['male', 'female'];
        $roles = ['admin', 'customer'];

        // Data for users 
        for ($i = 1; $i <= 10; $i++) {

            $user = new User();
            $genre = $faker->randomElement($genres);
            $role = $faker->randomElement($roles);

            $picture = 'https://randomuser.me/api/portraits/';
            $pictureId = $faker->numberBetween(1, 99) . '.jpg';

            $hash = $this->encoder->encodePassword($user, 'password');

            // Check the gender 
            if ($genre == "male") {
                $picture = $picture . 'men/' . $pictureId;
            } else {
                $picture = $picture . 'women/' . $pictureId;
            }


            $user->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setEmail($faker->email)
                ->setPicteur($picture)
                ->setHash($hash)
                ->setPasswordConfirm($hash)
                ->setUseRole($role);

            $manager->persist($user);
        }

        // data for ads
        for ($i = 1; $i <= 30; $i++) {

            $ad = new Ad();


            $title = $faker->sentence();

            $couverImage = "https://picsum.photos/70/40?random=" . mt_rand(1, 5000);
            $introduction = $faker->paragraph(2);
            $content =  $faker->paragraph(3);

            $ad->setTitle($title)
                ->setCoverImage($couverImage)
                ->setIntroduction($introduction)
                ->setContent($content)
                ->setPrice(mt_rand(1, 5));

            for ($j = 1; $j < mt_rand(2, 5); $j++) {

                $image = new Image();

                $image->setUrl($faker->imageUrl())
                    ->setCaption($faker->sentence(3))
                    ->setAd($ad);

                $manager->persist($image);
            }

            $manager->persist($ad);
        }


        $manager->flush();
    }
}

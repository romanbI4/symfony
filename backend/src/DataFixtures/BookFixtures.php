<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

class BookFixtures extends Fixture implements DependentFixtureInterface
{

    /**
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        $androidCategory = $this->getReference(BookCategoryFixtures::ANDROID_CATEGORY);
        $devicesCategory = $this->getReference(BookCategoryFixtures::DEVICES_CATEGORY);

        $books = (new Book())
            ->setTitle('ReJava for Android Developers')
            ->setPublishedDate(new DateTime("2019-04-01")) //Todo refactor this, error on type in published date
            ->setMeap(false)
            ->setAuthors(['Timo'])
            ->setSlug('rejava-android=developer')
            ->setCategories(new ArrayCollection([$androidCategory, $devicesCategory]))
            ->setImage('https://bs-uploads.toptal.io/blackfish-uploads/components/blog_post_page/content/cover_image_file/cover_image/686069/regular_800x320_cover-0717_TheMissingReactiveProgrammingLibraryforAndroid_Razvan_Newsletter-8f29d278e09a9fd8ea573c1773736b69.png');

        $manager->persist($books);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BookCategoryFixtures::class
        ];
    }
}

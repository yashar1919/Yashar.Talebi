<?php

class SearchHotel
{
    private \Doctrine\ORM\EntityManagerInterface $entityManager;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function search($input)
    {
        $hotelRepository = $this->entityManager->getRepository(\App\Entity\Hotel::class);
        return $hotelRepository->createQueryBuilder('h')
            ->where('b.name like :q')
            ->setParameter('q', '%' . $input . '%')
            ->getQuery()
            ->getResult();
    }

}
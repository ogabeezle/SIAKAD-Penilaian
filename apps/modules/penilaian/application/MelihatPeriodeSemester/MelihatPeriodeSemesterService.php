<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\SemesterRepository;

class MelihatPeriodeSemesterService
{
    private $semesterRepository;

    public function __construct(
        SemesterRepository $semesterRepository
    )
    {
        $this->semesterRepository = $semesterRepository;
    }

    public function execute()
    {
        $listSemester = $this->semesterRepository->all();
        return new MelihatPeriodeSemesterResponse(listSemester);
    }
}
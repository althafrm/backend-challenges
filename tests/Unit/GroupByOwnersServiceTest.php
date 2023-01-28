<?php

namespace Tests\Unit;

use App\Services\GroupByOwnersService;
use PHPUnit\Framework\TestCase;

class GroupByOwnersServiceTest extends TestCase
{
    /** @test */
    public function it_groups_items_by_owner()
    {
        $items = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B"
        ];

        $expected = [
            "Company A" => ["insurance.txt", "letter.docx"],
            "Company B" => ["Contract.docx"]
        ];

        $groupByOwnersService = new GroupByOwnersService();
        $result = $groupByOwnersService->processArray($items);

        $this->assertEquals($expected, $result);
    }
}

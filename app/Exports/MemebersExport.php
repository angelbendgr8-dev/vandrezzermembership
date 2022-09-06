<?php

namespace App\Exports;

use App\Models\User;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use Maatwebsite\Excel\Concerns\FromQuery;

use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class MemebersExport implements FromQuery, WithColumnFormatting, WithMapping,ShouldAutoSize
{
    use Exportable;

    public function __construct(int $club)
    {
        $this->club = $club;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return User::query()->whereClubId($this->club)->with('mclub');
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->email,
            $user->firstname,
            $user->lastname,
            $user->display_name,
            $user->type,
            $user->mobile_number,
            $user->status,
            $user->mclub->name,
            Date::dateTimeToExcel($user->updated_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}

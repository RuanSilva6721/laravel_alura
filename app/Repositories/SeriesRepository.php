<?php
namespace App\Repositories;


use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;

interface SeriesRepository {

    public function addSeries(SeriesFormRequest $request): Series;
}

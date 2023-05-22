<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCategory;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
class HomeController extends Controller
{
    public function index(){
        // return view('admin.index'); 
        $chart_options = [
            'chart_title' => 'Libros por categoria',
            'chart_type' => 'bar',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\BookCategory',
            'relationship_name' => 'category',
            'group_by_field' => 'Nombre',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'aggregate_field' => 'book_id',
        ];
        $chart = new LaravelChart($chart_options);
        return view('admin.index', compact('chart'));
    }

    public function chartData() {
        $chart_options = [
            'chart_title' => 'Libros por categoria',
            'chart_type' => 'bar',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\BookCategory',
            'relationship_name' => 'category',
            'group_by_field' => 'Nombre',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'aggregate_field' => 'book_id',
        ];
        // $chart = new LaravelChart($chart_options);
        // return response()->json($chart->datasets);
    //     $chart = new LaravelChart($chart_options);
    //     $chartData = $chart->get($chartData);
    
    //     return response()->json($chartData);
    $chart = new LaravelChart($chart_options);
    // return response()->json($chart->getDatasets());
    return $chart->getDatasets();
    }


}

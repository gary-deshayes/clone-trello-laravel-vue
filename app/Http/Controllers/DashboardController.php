<?php

namespace App\Http\Controllers;


use App\Models\Card;
use Illuminate\Http\Request;
use App\Models\Columns;
use App\Models\Dashboard as Dashboard;

class DashboardController extends Controller
{
    /**
     * Permet de récupérer tout les dashboard
     */
    public function  getDashboard($id)
    {
        $dashboard = Dashboard::find($id);
        $dashboard->columns;
        //Pour chaque colonnes on récupère ses cartes
        foreach ($dashboard->columns as $column) {
            $column->cards;
        }
        return $dashboard;
    }
    /**
     * Permet de récupérer tout les dashboard
     */
    public function  getDashboards()
    {
        $dashboards = Dashboard::all();
        return $dashboards;
    }

    /**
     * Création d'un dashboard
     */
    public function createDashboard(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'max:255', 'unique:dashboards']
        ]);
        $dashboard = Dashboard::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return $dashboard->save();
    }

    /**
     * Mise à jour d'un dashboard
     */
    public function updateDashboard(Request $request)
    {
        try {
            $dashboard = Dashboard::find($request->dashboard['id']);
            $dashboard->name = $request->dashboard['name'];
            $dashboard->description = $request->dashboard['description'];
            $dashboard->save();
            return response()->json([$dashboard], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Suppression d'un dashboard
     */
    public function deleteDashboard(Request $request)
    {
        try {
            $dashboard = Dashboard::find($request->dashboard);
            $dashboard->delete();
            return response()->json([], 204);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}

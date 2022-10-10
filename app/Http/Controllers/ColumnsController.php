<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Columns;

class ColumnsController extends Controller
{

    /**
     * Ajout d'une colonne
     */
    public function addColumn(Request $request)
    {
        try {
            $column = new Columns();
            $column->name = $request->name;
            $column->color = $request->color;
            $column->dashboard_id = $request->dashboard_id;
            $column->save();

            return response()->json([$column], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Mise à jour d'une colonne
     */
    public function updateColumn(Request $request)
    {
        try {
            $column = Columns::find($request->column['id']);
            $column->name = $request->column['name'];
            $column->color = $request->column['color'];
            $column->save();

            return response()->json([$column], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Suppression d'une colonne
     */
    public function deleteColumn(Request $request)
    {
        try {
            $card = Columns::find($request->column);
            $card->delete();
            return response()->json([], 204);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{

    /**
     * Ajout d'une carte
     */
    public function addCard(Request $request)
    {
        try {
            $card = new Card();
            $card->title = $request->card['title'];
            $card->description = $request->card['description'];
            $card->column_id = $request->column_id;
            $card->save();

            return response()->json([$card], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Mise à jour d'une carte
     */
    public function updateCard(Request $request)
    {
        try {
            $card = Card::find($request->card['id']);
            $card->title = $request->card['title'];
            $card->description = $request->card['description'];
            $card->save();
            return response()->json([$card], 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Suppression d'une carte
     */
    public function deleteCard(Request $request)
    {
        try {
            $card = Card::find($request->card);
            $card->delete();
            return response()->json([], 204);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Changement de colonne d'une carte
     */
    public function changeCardColumn(Request $request)
    {
        $card = Card::find($request->card);
        $card->column_id = $request->column;
        $card->save();
        return response()->json([], 201);
    }
}

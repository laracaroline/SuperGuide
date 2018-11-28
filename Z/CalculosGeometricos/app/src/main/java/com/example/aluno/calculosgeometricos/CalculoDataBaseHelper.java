package com.example.aluno.calculosgeometricos;

import android.content.ContentValues;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class CalculoDataBaseHelper extends SQLiteOpenHelper {
    private static final String DB_NAME = "calculodb";
    private static final int DB_VERSION = 1;

    CalculoDataBaseHelper(Context context) {super(context, DB_NAME,null, DB_VERSION);}

    @Override
    public void onCreate(SQLiteDatabase db){
        db.execSQL("CREATE TABLE figuras (" +
                "_id INTEGER PRIMARY KEY AUTOINCREMENT, " +
                "nome TEXT, " +
                "tipo TEXT);");

        db.execSQL("CREATE TABLE historicos (_id INTEGER PRIMARY KEY AUTOINCREMENT, " +
                "nome TEXT, " +
                "area TEXT, " +
                "volume TEXT, " +
                "_idFigura INTEGER, " +
                "FOREIGN KEY(_idFigura) REFERENCES _id(figuras));");

        insertFiguras(db, "Quadrado", "bidimensional");
        insertFiguras(db, "Retangulo", "bidimensional");
        insertFiguras(db, "Trapezio", "bidimensional");
        insertFiguras(db, "Triangulo", "bidimensional");
        insertFiguras(db, "Circulo", "bidimensional");

        insertFiguras(db, "Cubo", "Tridimensional");
        insertFiguras(db, "Prisma retangular", "Tridimensional");
        insertFiguras(db, "Prisma Trapezoidal", "Tridimensional");
        insertFiguras(db, "Prisma Triangular", "Tridimensional");
        insertFiguras(db, "Esfera", "Tridimensional");
    }
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
    }

    private static void insertHistorico(SQLiteDatabase db, String nome, String area, String volume, int _idFigura) {
        ContentValues valoresHistorico = new ContentValues();
        valoresHistorico.put("nome", nome);
        valoresHistorico.put("area", area);
        valoresHistorico.put("volume", volume);
        valoresHistorico.put("idFigura", _idFigura);
        db.insert("historicos", null, valoresHistorico);
    }

    private static void insertFiguras(SQLiteDatabase db, String nome, String tipo) {
        ContentValues valoresFiguras = new ContentValues();
        valoresFiguras.put("nome", nome);
        valoresFiguras.put("tipo", tipo);
        db.insert("figuras", null, valoresFiguras);
    }
}

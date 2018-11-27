package com.example.aluno.calculosgeometricos;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class CalculoDataBaseHelper extends SQLiteOpenHelper {
    private static final String DB_NAME = "calculodb";
    private static final int DB_VERSION = 1;

    CalculoDataBaseHelper(Context context) {super(context, DB_NAME,null, DB_VERSION);}

    @Override
    public void onCreate(SQLiteDatabase db){
        db.execSQL("CREATE TABLE figuras (_id INTEGER PRIMARY KEY AUTOINCREMENT, nome TEXT, tipo TEXT);");
        db.execSQL("CREATE TABLE historicos (_id INTEGER PRIMARY KEY AUTOINCREMENT, nome TEXT, area TEXT, volume TEXT, _idFigura FOREIGN KEY (_id) REFERENCES calculodb.figuras(_id));");

    }
}

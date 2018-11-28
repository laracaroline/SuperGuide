package com.example.aluno.calculosgeometricos;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class MenuActivity extends Activity {
    public static final String PLANO = "com.example.aluno.calculosgeometricos.PLANO";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);
    }

    public void tridimensional(View view) {
        Intent intent = new Intent(this, ListFiguras.class);
        startActivity(intent);

        String tipoFigura = "1";
        intent.putExtra(PLANO, tipoFigura);

        startActivity(intent);
    }

    public void bidimensional(View view) {
        Intent intent = new Intent(this, ListFiguras.class);
        startActivity(intent);

        String tipoFigura = "0";
        intent.putExtra(PLANO, tipoFigura);

        startActivity(intent);
    }
}

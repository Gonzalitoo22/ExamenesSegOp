package com.example.gonzo.examen5programacionweb2op;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    Button btnAgregar, btnEliminar, btnBuscar, btnModificar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        btnBuscar = (Button) findViewById(R.id.btnBuscar);
    }

    public void abrirActivities(View v){

        Intent i;
        switch (v.getId()){
            case R.id.btnBuscar:
                i = new Intent(MainActivity.this, ActivityConsultas.class);
                startActivity(i);
            break;
        }

    }
}

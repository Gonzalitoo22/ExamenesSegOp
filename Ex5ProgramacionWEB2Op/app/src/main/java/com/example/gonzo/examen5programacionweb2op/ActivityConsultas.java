package com.example.gonzo.examen5programacionweb2op;

import android.app.Activity;
import android.os.AsyncTask;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.RadioButton;
import android.widget.RadioGroup;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import controlador.Analizador_JSON;

public class ActivityConsultas extends Activity {
    ListView lsl_consulta;
    ArrayAdapter<String> adapter;
    ArrayList<String> arrayList=new ArrayList<>();


    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_consultas);
        lsl_consulta=findViewById(R.id.lsl_consulta);

        new MostrarUsuarios().execute();
        adapter= new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,arrayList);
        lsl_consulta.setAdapter(adapter);


    }//onCreate
    class MostrarUsuarios extends AsyncTask<String,String,String> {

        @Override
        protected String doInBackground(String... strings) {
            Analizador_JSON analizador_json = new Analizador_JSON();
            //cambiar el nombre del archivo php, debe de ser el de consulta
            String url="http://192.168.137.134/Semestre_7/Pruebas_PHP/Nueva_carpeta/Sistema_ABCC_MSQL/web_service_http_android/consultas_usuarios.php";
            JSONObject jsonObject= analizador_json.peticionHTTP(url);
            try {
                JSONArray jsonArray = jsonObject.getJSONArray("usuarios");
                String cadena="";
                for (int i=0; i<jsonArray.length();i++){
                    cadena=jsonArray.getJSONObject(i).getString("usuar")+"|"+
                            jsonArray.getJSONObject(i).getString("contra");
                    //se agrega Strig ´por String al array list, esto llena el array lista para despues meterlo al adaptador
                    arrayList.add(cadena);


                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
            return null;
        }//mostrar alumnos
    }
}

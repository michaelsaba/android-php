package com.example.project;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class Searchtext extends Activity {
    EditText Text;
    Button Cancel,Search;
    public static final String text="";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search);
        Text = (EditText) findViewById(R.id.text);
        Cancel = (Button) findViewById(R.id.cancel);
        Search = (Button) findViewById(R.id.search);
        String text=Text.getText().toString();

        Cancel.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Searchtext.this, SuccessActivity.class);
                startActivity(intent);
            }

        });
        Search.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Searchtext.this, SearchActivity.class);
                intent.putExtra("text",text);
                startActivity(intent);
               }
        });
    }
}
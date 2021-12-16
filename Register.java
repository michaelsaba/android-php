package com.example.project;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class Register extends Activity {
    EditText Email, Password,Name,Lname,Phone,Attribute;
    Button Create,Cancel;
    RequestQueue requestQueue;
    String EmailHolder, PasswordHolder,NameHolder,LnameHolder,PhoneHolder,AttributeHolder;
    ProgressDialog progressDialog;
    String HttpUrl = "http://192.168.0.103/project/android/register.php";
    Boolean CheckEditText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        Email = (EditText) findViewById(R.id.email);
        Password = (EditText) findViewById(R.id.password);
        Name = (EditText) findViewById(R.id.name);
        Lname = (EditText) findViewById(R.id.lname);
        Phone = (EditText) findViewById(R.id.phone);
        Attribute = (EditText) findViewById(R.id.attribute);
        Cancel = (Button) findViewById(R.id.Cancel);
        Create=(Button)findViewById(R.id.Create); ;
        requestQueue = Volley.newRequestQueue(Register.this);
        progressDialog = new ProgressDialog(Register.this);

        Cancel.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Register.this, MainActivity.class);
                startActivity(intent);
            }


        });
        Create.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                CheckEditTextIsEmptyOrNot();

                if (CheckEditText) {

                    UserCreate();

                } else {

                    Toast.makeText(Register.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

                }

            }
        });

    }
    public void UserCreate() {
        progressDialog.setMessage("Please Wait");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl, new Response.Listener<String>() {
            @Override
            public void onResponse(String ServerResponse) {

                progressDialog.dismiss();
                if(ServerResponse.equalsIgnoreCase("Data Matched")) {
                    Toast.makeText(Register.this, "Account created Successfuly", Toast.LENGTH_LONG).show();
                    finish();
                    Intent intent = new Intent(Register.this, MainActivity.class);
                    startActivity(intent);
                }
                else {
                    Toast.makeText(Register.this, ServerResponse, Toast.LENGTH_LONG).show();

                }


            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {
                        progressDialog.dismiss();
                        Toast.makeText(Register.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {

                Map<String, String> params = new HashMap<>();
                params.put("name", NameHolder);
                params.put("lname", LnameHolder);
                params.put("phone", PhoneHolder);
                params.put("email", EmailHolder);
                params.put("password", PasswordHolder);
                params.put("attribute",AttributeHolder);

                return params;
            }

        };
        RequestQueue requestQueue = Volley.newRequestQueue(Register.this);
        requestQueue.add(stringRequest);

    }

    public void CheckEditTextIsEmptyOrNot() {
        NameHolder = Name.getText().toString().trim();
        LnameHolder = Lname.getText().toString().trim();
        PhoneHolder = Phone.getText().toString().trim();
        EmailHolder = Email.getText().toString().trim();
        PasswordHolder = Password.getText().toString().trim();
        AttributeHolder=Attribute.getText().toString().trim();
        if (TextUtils.isEmpty(EmailHolder) || TextUtils.isEmpty(PasswordHolder) || TextUtils.isEmpty(NameHolder) || TextUtils.isEmpty(LnameHolder) || TextUtils.isEmpty(PhoneHolder)|| TextUtils.isEmpty(AttributeHolder) ) {
            CheckEditText = false;
        } else {
            CheckEditText = true;
        }
    }

}

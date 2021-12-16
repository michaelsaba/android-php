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

public class AddPost extends Activity {
    EditText Text,Email,Attribute;
    Button Cancel,Post;
    RequestQueue requestQueue;
    String  TextHolder,EmailHolder,AttributeHolder;
    ProgressDialog progressDialog;
    String HttpUrl = "http://192.168.0.103/project/android/post.php";
    Boolean CheckEditText;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_post);
        Text = (EditText) findViewById(R.id.text);
        Email = (EditText) findViewById(R.id.email);
        Attribute = (EditText) findViewById(R.id.attribute);
        Cancel = (Button) findViewById(R.id.cancel);
        Post = (Button) findViewById(R.id.post);
        requestQueue = Volley.newRequestQueue(AddPost.this);
        progressDialog = new ProgressDialog(AddPost.this);

        Cancel.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                Intent intent = new Intent(AddPost.this, SuccessActivity.class);
                startActivity(intent);
            }


        });
        Post.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                CheckEditTextIsEmptyOrNot();

                if (CheckEditText) {

                   Addpost();

                } else {

                    Toast.makeText(AddPost.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

                }

            }
        });

    }
    public void Addpost() {
        progressDialog.setMessage("Please Wait");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl, new Response.Listener<String>() {
            @Override
            public void onResponse(String ServerResponse) {

                progressDialog.dismiss();
                if(ServerResponse.equalsIgnoreCase("Data Matched")) {
                    Toast.makeText(AddPost.this, "Post Added Successfuly", Toast.LENGTH_LONG).show();
                    finish();
                    Intent intent = new Intent(AddPost.this, SuccessActivity.class);
                    startActivity(intent);
                }
                else {
                    Toast.makeText(AddPost.this, ServerResponse, Toast.LENGTH_LONG).show();
                    Intent intent = new Intent(AddPost.this, SuccessActivity.class);
                    startActivity(intent);
                }


            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {
                        progressDialog.dismiss();
                        Toast.makeText(AddPost.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {

                Map<String, String> params = new HashMap<String, String>();
                params.put("text", TextHolder);
                params.put("email", EmailHolder);
                params.put("attribute", AttributeHolder);
                return params;
            }

        };
        RequestQueue requestQueue = Volley.newRequestQueue(AddPost.this);
        requestQueue.add(stringRequest);

    }


    public void CheckEditTextIsEmptyOrNot() {
        TextHolder = Text.getText().toString().trim();
        EmailHolder = Email.getText().toString().trim();
        AttributeHolder = Attribute.getText().toString().trim();
        if (TextUtils.isEmpty(TextHolder)||TextUtils.isEmpty(AttributeHolder)||TextUtils.isEmpty(EmailHolder)) {
            CheckEditText = false;
        } else {
            CheckEditText = true;
        }
    }
}


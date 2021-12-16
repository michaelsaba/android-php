package com.example.project;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.DividerItemDecoration;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.net.URL;
import java.util.ArrayList;
import java.util.List;
public class SearchActivity extends AppCompatActivity {
    private ImageView Search,Add;
    private RecyclerView mList;
    private LinearLayoutManager linearLayoutManager;
    private DividerItemDecoration dividerItemDecoration;
    private List<ListPost> Posts;
    private RecyclerView.Adapter adapter;
    String url="";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_searchin);
        mList=(RecyclerView)findViewById(R.id.recycleview);
        Search=(ImageView)findViewById(R.id.search) ;
        Add=(ImageView)findViewById(R.id.post);
        Posts=new ArrayList<>();
        adapter=new MyAdapter(getApplicationContext(), Posts);
        linearLayoutManager=new LinearLayoutManager(this);
        linearLayoutManager.setOrientation(LinearLayoutManager.VERTICAL);
        dividerItemDecoration=new DividerItemDecoration(mList.getContext(),linearLayoutManager.getOrientation());
        mList.setHasFixedSize(true);
        mList.setLayoutManager(linearLayoutManager);
        mList.addItemDecoration(dividerItemDecoration);
        mList.setAdapter(adapter);
        Intent intent = getIntent();
        Bundle extras=intent.getExtras();
        String text=extras.getString("text");
        url = "http://192.168.0.103/project/android/search.php?text="+text;
        getdata();
    }
    private void getdata() {
        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(url, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                for (int i = 0; i < response.length(); i++) {
                    try {
                        JSONObject jsonObject = response.getJSONObject(i);
                        ListPost listpost = new ListPost();
                        listpost.setEmail(jsonObject.getString("email"));
                        listpost.setText(jsonObject.getString("text"));
                        listpost.setDate(jsonObject.getString("posted_at"));

                        Posts.add(listpost);
                    } catch (JSONException e) {
                        e.printStackTrace();
                        progressDialog.dismiss();
                    }
                }
                adapter.notifyDataSetChanged();
                progressDialog.dismiss();
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("Volley", error.toString());
                progressDialog.dismiss();
            }
        });
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(jsonArrayRequest);
    }

    public void search(View view) {
        Intent intent = new Intent(SearchActivity.this, Searchtext.class);
        startActivity(intent);
    }

    public void addpost(View view){
        Intent intent = new Intent(SearchActivity.this, AddPost.class);
        startActivity(intent);

    }

    public void home(View view) {
        Intent intent = new Intent(SearchActivity.this, SuccessActivity.class);
        startActivity(intent);


    }
}

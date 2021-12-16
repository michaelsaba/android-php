package com.example.project;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

public class MyAdapter extends RecyclerView.Adapter<MyAdapter.ViewHolder>{

        private Context context;
        private List<ListPost> list;

        public MyAdapter(Context context, List<ListPost> list) {
            this.context = context;
            this.list = list;
        }

        @Override
        public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View v = LayoutInflater.from(context).inflate(R.layout.list_post, parent, false);
            return new ViewHolder(v);
        }

        @Override
        public void onBindViewHolder(ViewHolder holder, int position) {
            ListPost listpost = list.get(position);

            holder.Text.setText(listpost.getText());
            holder.Email.setText(listpost.getEmail());
            holder.Date.setText(listpost.getDate());
        }

        @Override
        public int getItemCount() {
            return list.size();
        }

        public class ViewHolder extends RecyclerView.ViewHolder {
            public TextView Email, Text, Date;

            public ViewHolder(View itemView) {
                super(itemView);
                Email = itemView.findViewById(R.id.email);
                Text = itemView.findViewById(R.id.text);
                Date = itemView.findViewById(R.id.date);
            }
        }
}

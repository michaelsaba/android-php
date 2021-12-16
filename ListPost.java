package com.example.project;

public class ListPost {
  public String Email,Text,Date;
  public  ListPost(){}

  public ListPost(String Email,String Text,String Date ){
    this.Email=Email;
    this.Text=Text;
    this.Date=Date;
  }

  public String getEmail() {
    return Email;
  }

  public String getText() {
    return Text;
  }

  public String getDate() {
    return Date;
  }

  public void setEmail(String email) {
    Email = email;
  }

  public void setText(String text) {
    Text = text;
  }

  public void setDate(String date) {
    Date = date;
  }
}

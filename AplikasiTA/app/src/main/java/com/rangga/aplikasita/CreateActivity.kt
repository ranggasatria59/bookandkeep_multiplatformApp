package com.rangga.aplikasita

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.EditText
import android.widget.Toast
import com.google.android.material.button.MaterialButton
import retrofit2.Call
import retrofit2.Response
import java.util.*
import javax.security.auth.callback.Callback

class CreateActivity : AppCompatActivity() {
    private val api by lazy { ApiRetrofit().endpoint }
    private lateinit var editNambar : EditText
    private lateinit var editstokbar : EditText
    private lateinit var buttonCreate : MaterialButton

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_create)
        setupView()
        setupListener()
        supportActionBar?.title = "Tambah Barang"
    }

    private fun setupView(){
        editNambar = findViewById(R.id.edit_nambar)
        editstokbar = findViewById(R.id.edit_stokbar)
        buttonCreate = findViewById(R.id.button_create)
    }
    private fun setupListener(){
        buttonCreate.setOnClickListener{
            if(editNambar.text.toString().isNotEmpty()&&editstokbar.text.toString().isNotEmpty()){
                Log.e("CreateActivity",editNambar.text.toString())
                Log.e("CreateActivity",editstokbar.text.toString())
                api.create( editNambar.text.toString(),editstokbar.text.toString())
                    .enqueue(object : retrofit2.Callback<SubmitModel> {
                        override fun onResponse(
                            call: Call<SubmitModel>,
                            response: Response<SubmitModel>
                        ) {
                            if (response.isSuccessful){
                                val submit = response.body()
                                Toast.makeText(applicationContext, submit!!.message,Toast.LENGTH_SHORT).show()
                                finish()
                            }
                        }

                        override fun onFailure(call: Call<SubmitModel>, t: Throwable) {
                        }

                    })
            } else{
                Toast.makeText(applicationContext, "harap isi semua kolom",Toast.LENGTH_SHORT).show()
            }

            }

        }
    }

package com.rangga.aplikasita

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.EditText
import android.widget.Toast
import com.google.android.material.button.MaterialButton
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class EditBarangActivity : AppCompatActivity() {
    private val api by lazy { ApiRetrofit().endpoint }
    private val namabarang by lazy { intent.getSerializableExtra("nama_barang")as BarangModel.Data} //mengambil data data di BarangModel
    private lateinit var editNambar : EditText
    private lateinit var editstokbar : EditText
    private lateinit var buttonUpdate : MaterialButton
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_edit_barang)
        setupView()
        setupListener()
        supportActionBar?.title = "Edit Barang"
    }
    private fun setupView(){
        editNambar = findViewById(R.id.edit_nambar)
        editstokbar = findViewById(R.id.edit_stokbar)
        buttonUpdate = findViewById(R.id.button_update)
        editNambar.setText(namabarang.nama_barang) //mengambil data pada Barangmodel
        editstokbar.setText(namabarang.stok_barang) //mengambil data pada Barangmodel
    }
    private fun setupListener(){
        buttonUpdate.setOnClickListener{
            api.update(namabarang.id_barang!! ,editNambar.text.toString(), editstokbar.text.toString())
                .enqueue(object : Callback<SubmitModel> {
                    override fun onResponse(
                        call: Call<SubmitModel>,
                        response: Response<SubmitModel>
                    ) {
                        if (response.isSuccessful){
                            val submit = response.body()
                            Toast.makeText(applicationContext, submit!!.message, Toast.LENGTH_SHORT).show()
                            finish()
                        }
                    }

                    override fun onFailure(call: Call<SubmitModel>, t: Throwable) {

                    }

                })

        }

    }
}
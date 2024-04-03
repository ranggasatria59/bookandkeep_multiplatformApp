package com.rangga.aplikasita

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.Toast
import androidx.recyclerview.widget.RecyclerView
import kotlinx.android.synthetic.main.activity_dashboard.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.util.*

class PermintaanActivity : AppCompatActivity() {
    private val api by lazy { ApiRetrofit().endpoint }
    private lateinit var pinjamAdapter1: PinjamAdapter
    private lateinit var listPinjam : RecyclerView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_permintaan)
        setupList()
    }
    override fun onStart(){
        super.onStart()
        getPermintaan()
    }
    private fun setupList(){
        listPinjam = findViewById(R.id.list_permintaan)
        pinjamAdapter1 = PinjamAdapter(arrayListOf(),object : PinjamAdapter.OnAdapterListener{
            override fun onTerimaPermintaan(pinjam: PinjamModel.Data) {
                api.terimaPinjaman(pinjam.id!!)
                    .enqueue(object : Callback<SubmitModel>{
                        override fun onResponse(
                            call: Call<SubmitModel>,
                            response: Response<SubmitModel>
                        ) {
                            if(response.isSuccessful){
                                val submit = response.body()
                                Toast.makeText(applicationContext,submit!!.message, Toast.LENGTH_SHORT).show()
                                getPermintaan()
                            }
                        }

                        override fun onFailure(call: Call<SubmitModel>, t: Throwable) {
                        }

                    })
            }

        })
        listPinjam.adapter=pinjamAdapter1
    }
    private fun getPermintaan(){
        api.permintaan().enqueue(object : Callback<PinjamModel>{
            override fun onResponse(call: Call<PinjamModel>, response: Response<PinjamModel>) {
                if(response.isSuccessful){
                    val listPermintaan = response.body()!!.result
                    pinjamAdapter1.setData(listPermintaan)
                }
            }

            override fun onFailure(call: Call<PinjamModel>, t: Throwable) {
                Log.e("PermintaanActivity", t.toString())
            }

        })
    }
}
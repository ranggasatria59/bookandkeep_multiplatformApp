package com.rangga.aplikasita

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.Toast
import androidx.recyclerview.widget.RecyclerView
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class PermintaanKembaliActivity : AppCompatActivity() {
    private val api by lazy { ApiRetrofit().endpoint }
    private lateinit var kembaliAdapter: BarangKembaliAdapter
    private lateinit var listKembali : RecyclerView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_permintaan_kembali)
        setupList()
    }
    override fun onStart(){
        super.onStart()
        getPengembalian()
    }
    private fun setupList(){
        listKembali = findViewById(R.id.list_pengembalian)
        kembaliAdapter = BarangKembaliAdapter(arrayListOf(),object : BarangKembaliAdapter.OnAdapterListener{
            override fun onTerimaPengembalian(kembali: PinjamModel.Data) {
                api.terimaKembali(kembali.id!!)
                    .enqueue(object : Callback<SubmitModel>{
                        override fun onResponse(
                            call: Call<SubmitModel>,
                            response: Response<SubmitModel>
                        ) {
                            if(response.isSuccessful){
                                val submit = response.body()
                                Toast.makeText(applicationContext,submit!!.message, Toast.LENGTH_SHORT).show()
                                getPengembalian()
                            }
                        }

                        override fun onFailure(call: Call<SubmitModel>, t: Throwable) {
                        }

                    })
            }


        })
        listKembali.adapter=kembaliAdapter
    }
    private fun getPengembalian(){
        api.barangkembali().enqueue(object : Callback<PinjamModel>{
            override fun onResponse(call: Call<PinjamModel>, response: Response<PinjamModel>) {
                val listPengembalian = response.body()!!.result
                kembaliAdapter.setData(listPengembalian)
            }

            override fun onFailure(call: Call<PinjamModel>, t: Throwable) {
            }
        })

    }
}
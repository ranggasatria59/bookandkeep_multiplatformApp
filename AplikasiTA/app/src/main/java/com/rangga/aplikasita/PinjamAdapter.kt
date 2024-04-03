package com.rangga.aplikasita

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

class PinjamAdapter (
    val result: ArrayList<PinjamModel.Data>,
    val listener : OnAdapterListener
    ): RecyclerView.Adapter<PinjamAdapter.ViewHolder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int) = ViewHolder(
        LayoutInflater.from(parent.context)
            .inflate(R.layout.adapter_pinjam, parent, false)
    )
    override fun onBindViewHolder(holder: PinjamAdapter.ViewHolder, position: Int) {
        val permintaan = result[position]
        holder.textNamaBarang.text = permintaan.nama_barang
        holder.textNamaPeminjam.text = permintaan.peminjam
        holder.telponpinjam.text = permintaan.telpon
        holder.jmlbrgpinjam.text = permintaan.jml_barang
        holder.tglbrgpinjam.text = permintaan.tgl_pinjam
        holder.tglbrgkmbli.text = permintaan.tgl_kembali
        holder.id_barang.text = permintaan.id_barang
        holder.id_user.text = permintaan.id_user
        holder.itemView.setOnClickListener{
            listener.onTerimaPermintaan( permintaan )

        }

    }

    override fun getItemCount() = result.size

    class ViewHolder(view : View): RecyclerView.ViewHolder(view){
        val textNamaBarang = view.findViewById<TextView>(R.id.text_namabarangpinjam)
        val textNamaPeminjam = view.findViewById<TextView>(R.id.text_namapinjam)
        val telponpinjam = view.findViewById<TextView>(R.id.text_namalevelpinjam)
        val jmlbrgpinjam = view.findViewById<TextView>(R.id.text_jmlbarangpinjam)
        val tglbrgpinjam = view.findViewById<TextView>(R.id.text_tglbarangpinjam)
        val tglbrgkmbli = view.findViewById<TextView>(R.id.text_tglbarangkembali)
        val id_barang = view.findViewById<TextView>(R.id.text_id_barang)
        val id_user = view.findViewById<TextView>(R.id.text_id_user)
        val Deletepinjaman = view.findViewById<ImageView>(R.id.deletepinjam)
        val terimapinjam = view.findViewById<ImageView>(R.id.terimapinjam)
    }

    public fun setData(permintaan: List<PinjamModel.Data>){
        result.clear()
        result.addAll(permintaan)
        notifyDataSetChanged()
    }
    interface OnAdapterListener{
        fun onTerimaPermintaan(pinjam : PinjamModel.Data)
    }

}

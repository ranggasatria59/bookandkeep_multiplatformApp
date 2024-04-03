package com.rangga.aplikasita

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

class TransaksiAdapter (
    val result: ArrayList<PinjamModel.Data>
) : RecyclerView.Adapter<TransaksiAdapter.ViewHolder>(){

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int) = ViewHolder(
        LayoutInflater.from(parent.context)
            .inflate(R.layout.adapter_transaksi_selesai, parent, false)
    )

    override fun onBindViewHolder(holder: TransaksiAdapter.ViewHolder, position: Int) {
        val transaksi = result[position]
        holder.textNamaBarang_selesai.text = transaksi.nama_barang
        holder.textNamaPeminjam_selesai.text = transaksi.peminjam
        holder.levelpinjam_selesai.text = transaksi.telpon
        holder.jmlbrgpinjam_selesai.text = transaksi.jml_barang
        holder.tglbrgpinjam_selesai.text = transaksi.tgl_pinjam
        holder.tglbrgkmbli_selesai.text = transaksi.tgl_kembali
        holder.id_barang.text = transaksi.id_barang
        holder.id_user.text = transaksi.id_user
    }

    override fun getItemCount() = result.size

    class ViewHolder(view : View): RecyclerView.ViewHolder(view){
        val textNamaBarang_selesai = view.findViewById<TextView>(R.id.text_namabarangselesai)
        val textNamaPeminjam_selesai = view.findViewById<TextView>(R.id.text_namaselesai)
        val levelpinjam_selesai = view.findViewById<TextView>(R.id.text_namalevelselesai)
        val jmlbrgpinjam_selesai = view.findViewById<TextView>(R.id.text_jmlbarangselesai)
        val tglbrgpinjam_selesai = view.findViewById<TextView>(R.id.text_tglbarangpinjamselesai)
        val tglbrgkmbli_selesai = view.findViewById<TextView>(R.id.text_tglbarangkembaliselesai)
        val id_barang = view.findViewById<TextView>(R.id.text_id_barang)
        val id_user = view.findViewById<TextView>(R.id.text_id_user)
    }

    public fun setData(transaksi: List<PinjamModel.Data>){
        result.clear()
        result.addAll(transaksi)
        notifyDataSetChanged()
    }
}


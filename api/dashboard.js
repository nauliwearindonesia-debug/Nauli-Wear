import supabase from "../lib/db.js";

export default async function handler(req, res) {

    if (req.method !== "GET") {
        return res.status(405).json({
            success: false,
            message: "Method tidak diizinkan"
        });
    }

    try {

        const { data, error } = await supabase
            .from("orders")
            .select("id, nama, produk, ukuran, hp, pembayaran, alamat, rating")
            .order("id", { ascending: false });

        if (error) throw error;

        res.status(200).json({
            success: true,
            total: data.length,
            data: data
        });

    } catch (err) {

        console.log(err);

        res.status(500).json({
            success: false,
            message: err.message
        });

    }

}

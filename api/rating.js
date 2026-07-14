import supabase from "../lib/db.js";

export default async function handler(req, res) {

    if (req.method !== "POST") {
        return res.status(405).json({
            success: false,
            message: "Method tidak diizinkan"
        });
    }

    try {

        const { id, rating } = req.body;

        if (!id || !rating) {
            return res.status(400).json({
                success: false,
                message: "Data tidak lengkap"
            });
        }

        const { error } = await supabase
            .from("orders")
            .update({ rating })
            .eq("id", id);

        if (error) throw error;

        res.status(200).json({
            success: true,
            message: "Rating berhasil disimpan"
        });

    } catch (err) {

        console.error(err);

        res.status(500).json({
            success: false,
            message: err.message
        });

    }

}

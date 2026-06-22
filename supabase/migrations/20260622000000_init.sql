-- =========================================================================
-- NewsMorph v2 (Versi Moderasi UI & Template Akun)
-- Supabase Database Schema
-- Buka Supabase SQL Editor, hapus skema lama (jika ada), lalu jalankan ini.
-- =========================================================================

-- 1. Tabel Accounts (Penyimpanan Konfigurasi Visual per Akun)
CREATE TABLE public.accounts (
    id UUID DEFAULT gen_random_uuid() PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    niche VARCHAR(255) NOT NULL,
    persona_prompt TEXT, -- Instruksi untuk Gemini
    
    -- Konfigurasi Visual Khusus Akun Ini (Diatur via Vercel Dashboard)
    outro_watermark_url TEXT, -- Link file video 2 detik untuk akhiran (contoh dari GDrive)
    background_color VARCHAR(10) DEFAULT '#000000', -- Warna background slideshow vertikal
    template_style VARCHAR(50) DEFAULT 'VERTICAL_SLIDESHOW',
    
    created_at TIMESTAMP WITH TIME ZONE DEFAULT NOW()
);

-- 2. Tabel Sources (Sumber Channel/Akun)
CREATE TABLE public.sources (
    id UUID DEFAULT gen_random_uuid() PRIMARY KEY,
    platform VARCHAR(50) NOT NULL,
    target_username VARCHAR(255) NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT NOW()
);

-- 3. Tabel Contents (Pusat Antrean & Moderasi Manusia)
CREATE TABLE public.contents (
    id UUID DEFAULT gen_random_uuid() PRIMARY KEY,
    source_id UUID REFERENCES public.sources(id),
    original_url TEXT,
    
    -- Penyimpanan Media Kolase/Album dari GDrive
    media_assets JSONB, -- [ { "type": "photo", "url": "gdrive_link_1" }, { "type": "video", "url": "gdrive_link_2" } ]
    selected_media JSONB, -- Array media yang di-ceklis user di Dashboard untuk masuk FFmpeg
    original_caption TEXT,
    
    -- AI Scoring (Oleh Groq)
    score_virality INT DEFAULT 0,
    score_fit INT DEFAULT 0,
    score_risk INT DEFAULT 0,
    
    -- AI Paraphrasing (Oleh Gemini)
    caption_account_a TEXT,
    caption_account_b TEXT,
    caption_account_c TEXT,
    
    -- Status Moderasi
    status VARCHAR(50) DEFAULT 'WAITING_APPROVAL', -- WAITING_APPROVAL (Menunggu Ceklis UI), READY (Siap dirender), DONE
    created_at TIMESTAMP WITH TIME ZONE DEFAULT NOW()
);

-- 4. Tabel Publish Logs (Ceker untuk Dashboard)
CREATE TABLE public.publish_logs (
    id UUID DEFAULT gen_random_uuid() PRIMARY KEY,
    content_id UUID REFERENCES public.contents(id),
    account_id UUID REFERENCES public.accounts(id),
    published_url TEXT,
    status VARCHAR(50) DEFAULT 'SUCCESS',
    error_message TEXT,
    published_at TIMESTAMP WITH TIME ZONE DEFAULT NOW()
);

-- =========================================================================
-- CATATAN: Supabase Storage tidak lagi diperlukan karena semua media mentah
-- sekarang disimpan di akun Google Drive terpisah Anda (menghemat 15GB).
-- =========================================================================

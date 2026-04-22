# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

Legacy PHP car rental website for Rent Car Professional (Medan, Indonesia). Monolithic server-side rendered application — no build system, no framework, no package manager.

**Stack:** PHP (procedural), Bootstrap 5.2, Font Awesome 4.5, jQuery, MySQL

## Running Locally

```bash
php -S localhost:8000
```

Requires a local MySQL instance. Database credentials are hardcoded in `class/koneksi.php` (uses deprecated `mysql_*` extension — only works on PHP ≤ 5.x or with `mysql` module explicitly enabled).

## Architecture

All root-level `.php` files are standalone pages sharing the same template structure:
1. `<head>` with Google Tag Manager (GTM-TSJ78GQF), Google Ads (AW-987335262), Facebook Pixel (631426645796596)
2. Bootstrap nav header
3. Page-specific content (pricing tables, text)
4. WhatsApp floating button + footer

**`class/` utilities:**
- `koneksi.php` — MySQL connection with hardcoded credentials
- `fungsi_validasi.php` — basic regex sanitization (strips non-alphanumeric)
- `library.php` — sets `Asia/Jakarta` timezone, defines Indonesian day/month arrays
- `tgl_indo.php` / `tgl.php` — date formatting in Indonesian

**`file.php`** fetches and outputs remote content from `https://rentcarprof-nempel.pages.dev/a.txt` — used as a remote include mechanism.

## Conventions

- All page content (prices, vehicle names, contact info) is hardcoded inline HTML — no CMS or database-driven content
- Content language is Indonesian
- Vehicle images live in `/img/` using the pattern `N.VehicleName.ext` (e.g., `1.DatsunMt.png`)
- No admin panel — update prices/content by editing the HTML directly in each `.php` file
- To add a page: copy the template from an existing page, update the nav across all pages, and add the URL to `sitemap.xml` and `robots.txt`

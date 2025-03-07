# WordPress Contributors Plugin

## Description
This WordPress plugin allows multiple authors to be assigned to a post. It adds a "Contributors" metabox in the post editor, where users can select multiple contributors. On the frontend, it displays the selected contributors at the end of the post with their Gravatars and links to their author pages.

## Features
- Adds a "Contributors" metabox to the post editor.
- Allows selecting multiple contributors per post.
- Saves selected contributors as post metadata.
- Displays contributors on the frontend with their Gravatar and author page links.

## Installation
1. Download the plugin ZIP file or clone the repository.
2. Upload the plugin folder to the `/wp-content/plugins/` directory.
3. Activate the plugin from the **Plugins** menu in WordPress.

## Usage
1. Open the WordPress post editor.
2. In the "Contributors" metabox, select the authors who contributed to the post.
3. Publish or update the post.
4. The contributors will be displayed at the end of the post on the frontend.

## Code Overview
- **Metabox:** Adds a checkbox list of users in the post editor.
- **Post Meta Handling:** Saves selected contributors in post metadata.
- **Frontend Display:** Uses `the_content` filter to append contributor details.
- **Security:** Implements a nonce for data validation.
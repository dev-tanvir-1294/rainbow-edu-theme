# Rainbow Edu Theme

A modern, responsive WordPress theme designed specifically for educational course enrollment systems. Built with Tailwind CSS for a clean, professional look and powered by custom post types for seamless course management.

## Features

### 🎓 Course Management
- Custom Course post type with full Gutenberg editor support
- Course categories for organized content structure
- Archive pages with responsive grid layout
- Individual course detail pages with enrollment forms

### 📝 Enrollment System
- Frontend enrollment forms with validation
- Duplicate enrollment prevention
- Automated email notifications (admin and student)
- Secure form processing with nonce verification

### 🎨 Modern Design
- Built with Tailwind CSS for utility-first styling
- Mobile-first responsive design
- Custom color palette with indigo primary colors
- Inter font family for modern typography
- Sticky navigation header
- Accessibility features (ARIA labels, skip links)

### 🔧 Technical Features
- SEO optimized with Open Graph and Twitter Card meta tags
- Custom admin columns for enrollment management
- REST API support for future extensibility
- Clean, maintainable code structure

## Requirements

- WordPress 5.9 or higher
- PHP 7.4 or higher
- Node.js and npm (for development/building styles)

## Installation

1. Download or clone this repository into your `wp-content/themes/` directory
2. Activate the theme through the WordPress admin dashboard
3. Navigate to **Appearance > Themes** and click **Activate** on Rainbow Edu

### Development Setup

If you want to modify the styles:

1. Install dependencies:
   ```bash
   npm install
   ```

2. Start the build process:
   ```bash
   npm run build
   ```

3. For development with watch mode:
   ```bash
   npm run dev
   ```

## Usage

### Creating Courses
1. Go to **Courses > Add New** in the WordPress admin
2. Add course title, content, and featured image
3. Set course metadata (level, duration, price) using custom fields
4. Assign to course categories for organization

### Managing Enrollments
- View all enrollments at **Enrollments** in the admin menu
- Custom columns show student details, enrolled course, and date
- Email notifications are sent automatically on enrollment

### Customizing Appearance
- Modify `tailwind.config.js` for color and typography changes
- Edit `input.css` for additional custom styles
- Rebuild with `npm run build` after changes

## File Structure

```
rainbow-edu-theme/
├── assets/
│   └── images/          # Theme images and icons
├── inc/
│   ├── course-cpt.php   # Course custom post type
│   └── enrollment.php   # Enrollment system
├── template-parts/
│   └── course-card.php  # Course card component
├── 404.php              # 404 error page
├── archive-course.php   # Course archive template
├── comments.php         # Comments template
├── footer.php           # Site footer
├── front-page.php       # Homepage template
├── functions.php        # Theme functions and setup
├── header.php           # Site header
├── index.php            # Main index template
├── input.css            # Tailwind CSS source
├── output.css           # Compiled CSS
├── package.json         # npm dependencies
├── page.php             # Page template
├── search.php           # Search results template
├── single-course.php    # Single course template
├── style.css            # Theme metadata
└── tailwind.config.js   # Tailwind configuration
```

## Customization

### Colors
The theme uses a custom indigo color palette. Modify `tailwind.config.js` to change colors:

```javascript
colors: {
  primary: {
    50: '#eef2ff',
    // ... other shades
    900: '#1a237e'
  }
}
```

### Typography
Inter font is loaded from Google Fonts. Change in `functions.php` if needed.

### Layout
Templates are located in the root directory. Modify PHP files for layout changes.

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This theme is licensed under the GPL v2 or later.

## Support

For support, please create an issue in this repository or contact the theme author.

## Changelog

### Version 1.0.0
- Initial release
- Course management system
- Enrollment functionality
- Tailwind CSS integration
- Responsive design</content>
<parameter name="filePath">c:\Users\ahmed\OneDrive\Desktop\rainbow-edu-theme\rainbow-edu-theme\README.md
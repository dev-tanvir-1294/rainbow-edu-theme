# Rainbow Edu Theme

A modern, responsive WordPress theme designed for educational institutions. Built with Tailwind CSS and featuring course management, student enrollment, and smooth animations.

## Description

Rainbow Edu is a custom WordPress theme tailored for schools, universities, and online learning platforms. It provides a clean, professional interface with built-in support for course listings, student enrollment, and interactive elements powered by GSAP animations.

## Features

- **Course Management**: Custom post type for courses with categories
- **Student Enrollment**: Secure enrollment system with form validation
- **Responsive Design**: Mobile-first design using Tailwind CSS
- **Animations**: Smooth hero animations using GSAP
- **Custom Menus**: Primary and footer navigation menus
- **WordPress Standards**: Full support for WordPress features including post thumbnails, HTML5, and block styles
- **Typography**: Inter font for body text and Roboto Condensed for headings

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Node.js and npm (for development/building CSS)

## Installation

1. Download or clone the theme into your `wp-content/themes/` directory
2. Activate the theme through the WordPress admin dashboard under **Appearance > Themes**
3. Install dependencies: `npm install`
4. Build the CSS: `npm run build`

## Usage

### Creating Courses

1. Go to **Courses > Add New** in the WordPress admin
2. Add course title, content, excerpt, and featured image
3. Assign to course categories as needed
4. Publish the course

### Managing Enrollments

Enrollments are handled automatically through the enrollment form on course pages. Administrators can view enrollments in the WordPress admin under **Courses > Enrollments**.

### Customization

- Edit `functions.php` for theme functionality
- Modify `tailwind.config.js` for styling configuration
- Update `input.css` for custom CSS additions

## Development

### Building CSS

- `npm run build`: Build minified CSS for production
- `npm run watch`: Watch for changes and rebuild CSS automatically

### File Structure

- `assets/js/`: JavaScript files (hero animations)
- `assets/images/`: Theme images
- `inc/`: Include files (CPT definitions, enrollment logic)
- `template-parts/`: Reusable template components

## License

This theme is licensed under the ISC License.
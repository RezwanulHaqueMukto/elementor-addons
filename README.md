# Elementor Addons Collection

Hey there! 👋 Welcome to my collection of custom Elementor widgets. This repository contains various widgets I've built to extend Elementor's functionality and make web design even more awesome.

## What's Inside?

This addon pack includes custom widgets that aren't available in the standard Elementor library. I built these because, let's be honest, sometimes you need that *one specific thing* that just doesn't exist yet.

### Current Widgets

The `widgets/` folder contains all the custom widgets. Each widget is designed to be:
- **Easy to use** - No confusing settings or overwhelming options
- **Responsive** - Works great on all devices
- **Customizable** - Plenty of styling options to match your design
- **Performance-focused** - Lightweight and fast-loading

## Getting Started

### Requirements

- WordPress 5.0+
- Elementor (Free or Pro) - Latest version recommended
- PHP 7.4 or higher

### Installation

1. **Download** this repository as a ZIP file
2. **Upload** it to your WordPress plugins directory (`/wp-content/plugins/`)
3. **Activate** the plugin through your WordPress admin
4. **Start using** the new widgets in Elementor!

That's it! The widgets will appear in your Elementor editor under their respective categories.

## How to Use

Once activated, you'll find the new widgets in your Elementor editor. Just:

1. Open any page/post with Elementor
2. Look for the new widgets in the elements panel
3. Drag and drop them onto your page
4. Customize using the settings panel
5. Enjoy your enhanced designs! 🎨

## Development

### Contributing

Found a bug? Have an idea for a new widget? I'd love to hear from you!

- **Issues**: Report bugs or request features
- **Pull Requests**: Contribute improvements or new widgets
- **Ideas**: Share your widget ideas in the issues section

### Adding New Widgets

Each widget follows the standard Elementor widget structure:

```php
class Your_Custom_Widget extends \Elementor\Widget_Base {
    // Widget implementation
}
```

Place new widget files in the `widgets/` directory and they'll be automatically loaded.

### File Structure

```
elementor-addons/
├── widgets/              # All widget files go here
├── inc/              # CSS, JS, and images
├── rez-elementor-addons.php # Main plugin file
└── README.md            # You are here!
```

## Browser Support

These widgets work on all modern browsers:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Changelog

### Version 1.0.0
- Initial release
- Added core widget functionality
- Basic responsive design support

## Support

Having trouble? Here's how to get help:

1. **Check the Issues** - Someone might have already solved your problem
2. **Create an Issue** - Describe your problem in detail
3. **Community** - Ask other users in the discussions section

## License

This project is open source and available under the [MIT License](LICENSE). Feel free to use it in your projects!

## Credits

Built with ❤️ by [Rezwanul Haque Mukto](https://github.com/RezwanulHaqueMukto)

Special thanks to the Elementor team for creating such an amazing page builder!

---

**Like this project?** Give it a ⭐ and share it with other WordPress developers!

**Need custom widgets?** Feel free to reach out if you need help with custom Elementor development.

---

*Made for the WordPress community. Happy building! 🚀*

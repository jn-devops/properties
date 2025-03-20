# Homeful Property Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jn-devops/property.svg?style=flat-square)](https://packagist.org/packages/jn-devops/property)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jn-devops/property/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jn-devops/property/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jn-devops/property/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jn-devops/property/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jn-devops/property.svg?style=flat-square)](https://packagist.org/packages/jn-devops/property)

---

## Description

The **Homeful Property Package** is designed to manage real estate properties, including attributes, associated projects, and product mappings. It provides structured data models for properties and projects, enabling efficient data handling for property listings and transactions.

This package provides:
- Property attribute management
- Project association and housing type categorization
- Product SKU linking for inventory tracking
- Market segment classification for property valuation

---

## Features

### 🏠 **Property Management**
- Define essential property attributes such as block, lot, phase, and building details
- Assign unit type, floor area, and house specifications (e.g., roof style, veranda, balcony)

### 🏗 **Project Association**
- Link properties to specific projects using project codes
- Store project details such as name, location, address, and company affiliation

### 📦 **Product Integration**
- Associate properties with product SKUs
- Maintain a direct relationship between properties and inventory management

### 🏡 **Housing & Market Segments**
- Categorize properties under different **Housing Types** (Single Detached, Condominium, etc.)
- Classify properties under **Market Segments** (Socialized, Economic, etc.)

---

## Installation

To install via Composer, run:

```bash
composer require jn-devops/property
```

---

## Usage

### 🔹 Creating a Property Instance

```php
use Homeful\Properties\Models\Property;

$property = Property::create([
    'code' => 'PROP001',
    'name' => 'Sample Property',
    'type' => 'Residential',
    'cluster' => 'Cluster A',
    'phase' => 'Phase 1',
    'block' => 'Block 2',
    'lot' => 'Lot 5',
    'floor_area' => 60.0,
    'lot_area' => 80.0,
    'unit_type' => 'Townhouse',
]);
```

### 🔹 Associating a Property with a Project

```php
use Homeful\Properties\Models\Project;

$project = Project::create([
    'code' => 'PROJ001',
    'name' => 'Sunrise Estates',
    'location' => 'Sta. Rosa City, Laguna',
    'company_code' => 'RLI'
]);

$property->project()->associate($project);
$property->save();
```

### 🔹 Linking a Product SKU

```php
use Homeful\Products\Models\Product;

$product = Product::create([
    'sku' => 'PROD123',
    'name' => 'Modern House Model'
]);

$property->product()->associate($product);
$property->save();
```

### 🔹 Retrieving Property Data

```php
use Homeful\Properties\Data\PropertyData;

$propertyData = PropertyData::fromModel($property);
```

---

## Testing

Run the tests with:

```bash
composer test
```

---

## Author

- **Lester B. Hurtado**  
  Email: [devops@joy-nostalg.com](mailto:devops@joy-nostalg.com)  
  GitHub: [jn-devops](https://github.com/jn-devops)

---

## License

This package is open-source software licensed under the **MIT License**. See the [License File](LICENSE.md) for details.

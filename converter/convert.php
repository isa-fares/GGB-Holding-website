<?php
/**
 * HTML to PHP Converter - Main Entry Point
 * 
 * This script converts static HTML websites into dynamic PHP structure.
 * Run this file from the command line to start the conversion process.
 * 
 * Usage:
 *   php convert.php
 * 
 * The converter will guide you through multiple stages:
 *   Stage 1: Create PHP page files from HTML
 *   Stage 2: Extract Header & Footer components
 *   Stage 3: Create master.php with CSS/JS links
 *   Stage 4: Migrate assets and convert links/images
 * 
 * @package HtmlToPhpConverter
 * @version 2.0.0
 * @author Your Name
 */

// Require all necessary files
require_once __DIR__ . '/src/Config.php';
require_once __DIR__ . '/src/Utils/Console.php';
require_once __DIR__ . '/src/Utils/FileManager.php';
require_once __DIR__ . '/src/Utils/LinkConverter.php';
require_once __DIR__ . '/src/Stages/PageCreator.php';
require_once __DIR__ . '/src/Stages/ComponentExtractor.php';
require_once __DIR__ . '/src/Stages/MasterFileBuilder.php';
require_once __DIR__ . '/src/Stages/AssetMigrator.php';
require_once __DIR__ . '/src/Converter.php';

// Create and run converter
$converter = new Converter();
$converter->run();

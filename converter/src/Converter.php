<?php
/**
 * Main Converter Class
 * 
 * Orchestrates the multi-stage HTML to PHP conversion process.
 * Manages execution flow between stages and handles user interaction.
 * 
 * @package HtmlToPhpConverter
 * @version 1.0.0
 */

class Converter {
    
    /**
     * Current conversion stage
     * 
     * @var int
     */
    private $currentStage = 1;
    
    /**
     * Total statistics across all stages
     * 
     * @var array
     */
    private $totalStats = [];
    
    /**
     * Start the conversion process
     * Begins with Stage 1 and prompts for subsequent stages
     * 
     * @return void
     */
    public function run() {
        // Execute Stage 1: Page Files Creation
        $this->executeStage1();
    }
    
    /**
     * Execute Stage 1: Page Files Creation
     * 
     * @return void
     */
    private function executeStage1() {
        $stage1 = new PageCreator();
        $success = $stage1->execute();
        
        if (!$success) {
            Console::error("Page Creator failed or was cancelled.");
            return;
        }
        
        // Store statistics
        $this->totalStats['stage1'] = $stage1->getStats();
        
        // Ask about Stage 2
        $this->promptForStage2();
    }
    
    /**
     * Prompt user for Stage 2
     * 
     * @return void
     */
    private function promptForStage2() {
        Console::infoBox("Next Stage Available", [
            "Component Extraction (Header & Footer)",
            "  - Extract Header component to ust.php",
            "  - Extract Footer component to alt.php",
            "  - Convert links to dynamic PHP"
        ]);
        
        if (Console::confirm("Do you want to proceed to Component Extraction?")) {
            $this->executeStage2();
        } else {
            Console::line();
            Console::info("Component Extraction skipped. You can run it later with --stage=2");
            Console::line();
            $this->finish();
        }
    }
    
    /**
     * Execute Stage 2: Header & Footer Extraction
     * 
     * @return void
     */
    private function executeStage2() {
        $stage2 = new ComponentExtractor();
        $success = $stage2->execute();
        
        if ($success) {
            // Store statistics
            $this->totalStats['stage2'] = $stage2->getStats();
            
            // Ask about Stage 3
            $this->promptForStage3();
        } else {
            Console::error("Component Extractor failed.");
            $this->finish();
        }
    }
    
    /**
     * Prompt user for Stage 3
     * 
     * @return void
     */
    private function promptForStage3() {
        Console::infoBox("Next Stage Available", [
            "Master File Builder (CSS/JS Links)",
            "  - Create/Update master.php",
            "  - Extract CSS links from <head>",
            "  - Extract JS links from <body>",
            "  - Scan assets directory for files"
        ]);
        
        if (Console::confirm("Do you want to proceed to Master File Builder?")) {
            $this->executeStage3();
        } else {
            Console::line();
            Console::info("Master File Builder skipped. You can run it later with --stage=3");
            Console::line();
            $this->promptForStage4();
        }
    }
    
    /**
     * Execute Stage 3: Master File Creation + CSS/JS
     * 
     * @return void
     */
    private function executeStage3() {
        $stage3 = new MasterFileBuilder();
        $success = $stage3->execute();
        
        if ($success) {
            // Store statistics
            $this->totalStats['stage3'] = $stage3->getStats();
            
            // Ask about Stage 4
            $this->promptForStage4();
        } else {
            Console::error("Master File Builder failed.");
            $this->finish();
        }
    }
    
    /**
     * Prompt user for Stage 4
     * 
     * @return void
     */
    private function promptForStage4() {
        Console::infoBox("Next Stage Available", [
            "Asset Migrator (Files & Folders)",
            "  - Migrate CSS/JS/Images to assets/",
            "  - Convert image paths to \$assetURL",
            "  - Convert links to BaseURL()"
        ]);
        
        if (Console::confirm("Do you want to proceed to Asset Migrator?")) {
            $this->executeStage4();
        } else {
            Console::line();
            Console::info("Asset Migrator skipped. You can run it later with --stage=4");
            Console::line();
            $this->finish();
        }
    }
    
    /**
     * Execute Stage 4: Assets Migration & Link Conversion
     * 
     * @return void
     */
    private function executeStage4() {
        $stage4 = new AssetMigrator();
        $success = $stage4->execute();
        
        if ($success) {
            // Store statistics
            $this->totalStats['stage4'] = $stage4->getStats();
        }
        
        $this->finish();
    }
    
    /**
     * Finish conversion process
     * Print final summary and exit
     * 
     * @return void
     */
    private function finish() {
        Console::line();
        Console::separator();
        Console::complete("Conversion process completed!");
        Console::separator();
        Console::line();
        
        // Print summary if we have stats
        if (!empty($this->totalStats)) {
            $this->printSummary();
        }
    }
    
    /**
     * Print conversion summary
     * 
     * @return void
     */
    private function printSummary() {
        Console::line();
        echo Console::COLOR_CYAN . "Conversion Summary:" . Console::COLOR_RESET . "\n";
        Console::line();
        
        if (isset($this->totalStats['stage1'])) {
            echo "  Page Creator:\n";
            echo "    - Files processed: " . $this->totalStats['stage1']['files_processed'] . "\n";
            echo "    - Pages created: " . $this->totalStats['stage1']['pages_created'] . "\n";
            echo "    - Links converted: " . $this->totalStats['stage1']['links_converted'] . "\n";
            Console::line();
        }
        
        if (isset($this->totalStats['stage2'])) {
            echo "  Component Extractor:\n";
            echo "    - Components created: " . $this->totalStats['stage2']['components_created'] . "\n";
            echo "    - Links converted: " . $this->totalStats['stage2']['links_converted'] . "\n";
            Console::line();
        }
        
        if (isset($this->totalStats['stage3'])) {
            echo "  Master File Builder:\n";
            echo "    - CSS files: " . $this->totalStats['stage3']['css_files'] . "\n";
            echo "    - JS files: " . $this->totalStats['stage3']['js_files'] . "\n";
            Console::line();
        }
        
        if (isset($this->totalStats['stage4'])) {
            echo "  Asset Migrator:\n";
            echo "    - Folders copied: " . $this->totalStats['stage4']['folders_copied'] . "\n";
            echo "    - Files copied: " . $this->totalStats['stage4']['files_copied'] . "\n";
            Console::line();
        }
        
        Console::complete("All done! Your project is ready.");
        Console::line();
    }
}

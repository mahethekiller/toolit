<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PortfolioExperience;
use App\Models\PortfolioSkill;
use App\Models\PortfolioProject;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        PortfolioExperience::truncate();
        PortfolioSkill::truncate();
        PortfolioProject::truncate();

        // Seed Experiences
        $this->seedExperiences();

        // Seed Skills
        $this->seedSkills();

        // Seed Projects
        $this->seedProjects();

        $this->command->info('Portfolio data seeded successfully!');
    }

    private function seedExperiences()
    {
        $experiences = [
            [
                'position' => 'Sr. Software Developer (PHP)',
                'company' => 'ROI MANTRA (I2k2 Networks)',
                'period' => '09.2016 – Present',
                'location' => 'Noida, India',
                'responsibilities' => [
                    'Collaborated with a team of 6 developers to design, develop, and maintain large-scale web applications and CMS platforms',
                    'Independently developed the Company HRM Management System (I2U2) using CodeIgniter, MySQL, and JavaScript',
                    'Worked extensively with frameworks such as Laravel, CodeIgniter, and Magento 1.9 to deliver scalable and high-performance solutions',
                    'Contributed to the in-house software SAGE (Core PHP) – a sales calling and management system',
                    'Designed and deployed more than 30+ WordPress and PHP-based websites, ensuring responsive layouts and SEO optimization',
                    'Specialized in WordPress core customization, plugin, and theme development',
                    'Published plugins on the official WordPress repository',
                    'Integrated third-party and internal APIs across WordPress, Laravel, and .NET-based systems',
                    'Improved backend performance, optimized SQL queries, and implemented secure authentication mechanisms'
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'position' => 'Software Developer (PHP)',
                'company' => 'Fourbrick Technology Pvt. Ltd.',
                'period' => '02.2016 – 08.2016',
                'location' => 'Noida',
                'responsibilities' => [
                    'Developed and maintained multiple PHP-based applications and WordPress websites for various clients',
                    'Worked on custom plugin development, theme customization, and website optimization',
                    'Built and integrated RESTful APIs for communication between web and mobile applications',
                    'Collaborated with designers and QA teams to ensure timely and high-quality project delivery',
                    'Contributed to projects involving CodeIgniter, Core PHP, MySQL, and JavaScript'
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'position' => 'Software Developer',
                'company' => 'Phonate Technologies',
                'period' => '07.2014 – 01.2016',
                'location' => 'Fatehpur',
                'responsibilities' => [
                    'Managed a team of 5 developers in delivering end-to-end PHP web applications',
                    'Designed and developed software products such as Diamond Valuer and Portfolio',
                    'Built RESTful APIs and Web Services for Android applications including Cashon, Diamond Valuer, AAP Kao Driver, Tejumal, and Metro Yantra',
                    'Developed and maintained multiple PHP-based client websites',
                    'Worked with Core PHP, MySQL, HTML, CSS, and JavaScript to create user-friendly and optimized web applications'
                ],
                'sort_order' => 3,
                'is_active' => true,
            ]
        ];

        foreach ($experiences as $experience) {
            PortfolioExperience::create($experience);
        }
    }

    private function seedSkills()
    {
        $skills = [
            // Programming Languages
            ['name' => 'PHP', 'level' => 95, 'category' => 'languages', 'type' => 'Backend', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'JavaScript', 'level' => 85, 'category' => 'languages', 'type' => 'Frontend', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'HTML5', 'level' => 90, 'category' => 'languages', 'type' => 'Frontend', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'CSS3', 'level' => 90, 'category' => 'languages', 'type' => 'Frontend', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'MySQL', 'level' => 90, 'category' => 'languages', 'type' => 'Database', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'jQuery', 'level' => 85, 'category' => 'languages', 'type' => 'Frontend', 'sort_order' => 6, 'is_active' => true],
            ['name' => 'AJAX', 'level' => 80, 'category' => 'languages', 'type' => 'Frontend', 'sort_order' => 7, 'is_active' => true],
            ['name' => 'JSON', 'level' => 85, 'category' => 'languages', 'type' => 'Data Format', 'sort_order' => 8, 'is_active' => true],

            // Frameworks & Technologies
            ['name' => 'Laravel', 'level' => 90, 'category' => 'frameworks', 'type' => 'PHP Framework', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'CodeIgniter', 'level' => 85, 'category' => 'frameworks', 'type' => 'PHP Framework', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'WordPress', 'level' => 95, 'category' => 'frameworks', 'type' => 'CMS', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'Magento 1.9', 'level' => 75, 'category' => 'frameworks', 'type' => 'E-commerce', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'React (Basic)', 'level' => 70, 'category' => 'frameworks', 'type' => 'Frontend', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'Bootstrap', 'level' => 85, 'category' => 'frameworks', 'type' => 'CSS Framework', 'sort_order' => 6, 'is_active' => true],

            // Other Skills
            ['name' => 'RESTful APIs', 'level' => 90, 'category' => 'other', 'type' => 'Integration', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Git/GitHub', 'level' => 85, 'category' => 'other', 'type' => 'Version Control', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'MySQL/MariaDB', 'level' => 90, 'category' => 'other', 'type' => 'Database', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'LAMP/WAMP Stack', 'level' => 85, 'category' => 'other', 'type' => 'Server', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'WHM/cPanel', 'level' => 80, 'category' => 'other', 'type' => 'Server Management', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'Apache/Nginx', 'level' => 75, 'category' => 'other', 'type' => 'Web Server', 'sort_order' => 6, 'is_active' => true],
            ['name' => 'CI/CD Pipelines', 'level' => 70, 'category' => 'other', 'type' => 'DevOps', 'sort_order' => 7, 'is_active' => true],
            ['name' => 'Database Optimization', 'level' => 85, 'category' => 'other', 'type' => 'Database', 'sort_order' => 8, 'is_active' => true],
            ['name' => 'Query Performance Tuning', 'level' => 80, 'category' => 'other', 'type' => 'Database', 'sort_order' => 9, 'is_active' => true],
            ['name' => 'Plugin Development', 'level' => 90, 'category' => 'other', 'type' => 'WordPress', 'sort_order' => 10, 'is_active' => true],
            ['name' => 'Theme Customization', 'level' => 85, 'category' => 'other', 'type' => 'WordPress', 'sort_order' => 11, 'is_active' => true],
            ['name' => 'SEO Optimization', 'level' => 80, 'category' => 'other', 'type' => 'Marketing', 'sort_order' => 12, 'is_active' => true],
            ['name' => 'VS Code', 'level' => 90, 'category' => 'other', 'type' => 'Tools', 'sort_order' => 13, 'is_active' => true],
            ['name' => 'Postman', 'level' => 85, 'category' => 'other', 'type' => 'Tools', 'sort_order' => 14, 'is_active' => true],
            ['name' => 'Chrome DevTools', 'level' => 80, 'category' => 'other', 'type' => 'Tools', 'sort_order' => 15, 'is_active' => true],
            ['name' => 'Xdebug', 'level' => 75, 'category' => 'other', 'type' => 'Tools', 'sort_order' => 16, 'is_active' => true],
        ];

        foreach ($skills as $skill) {
            PortfolioSkill::create($skill);
        }
    }

    private function seedProjects()
    {
        $projects = [
            [
                'name' => 'I2U2 - HR Management System',
                'description' => 'Developed independently using CodeIgniter, MySQL, and JavaScript for internal HR processes. Comprehensive system for managing employee data, attendance, leaves, and payroll.',
                'link' => null,
                'technologies' => ['CodeIgniter', 'MySQL', 'JavaScript', 'jQuery', 'Bootstrap'],
                'image' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Greenlam Laminates',
                'description' => 'Developed and maintained 30+ websites using Magento, Laravel, CodeIgniter, and WordPress for various product lines and regional portals.',
                'link' => 'https://greenlam.com',
                'technologies' => ['Magento', 'Laravel', 'CodeIgniter', 'WordPress', 'MySQL', 'JavaScript'],
                'image' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'SAGE - Sales Calling System',
                'description' => 'In-house sales calling and management software built with Core PHP. Features lead management, call tracking, and performance analytics.',
                'link' => null,
                'technologies' => ['Core PHP', 'MySQL', 'JavaScript', 'AJAX', 'Bootstrap'],
                'image' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Header and Footer Scripts Adder',
                'description' => 'Published WordPress plugin for adding custom header/footer scripts site-wide. Lightweight and easy-to-use plugin with 10,000+ active installations.',
                'link' => 'https://wordpress.org/plugins/header-and-footer-script-adder/',
                'technologies' => ['WordPress', 'PHP', 'JavaScript', 'Plugin Development'],
                'image' => null,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Translate Post to Language',
                'description' => 'Published WordPress plugin for post translation support. Enables multi-language content management with easy translation interface.',
                'link' => 'https://wordpress.org/plugins/translate-post-to-language/',
                'technologies' => ['WordPress', 'PHP', 'Translation API', 'Plugin Development'],
                'image' => null,
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Greenlam Warranty Portal',
                'description' => 'Developed warranty management system on Laravel for handling product warranties, claims, and customer support.',
                'link' => 'https://warranty.greenlamindustries.com',
                'technologies' => ['Laravel', 'MySQL', 'JavaScript', 'Bootstrap', 'RESTful API'],
                'image' => null,
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Azure Power Corporate Website',
                'description' => 'Corporate website built using Laravel framework for Azure Power, featuring company information, projects, and investor relations.',
                'link' => 'https://azurepower.com',
                'technologies' => ['Laravel', 'MySQL', 'JavaScript', 'Bootstrap', 'CMS'],
                'image' => null,
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'RGCIRC Hospital Website',
                'description' => 'Developed and maintained hospital website using WordPress. Features doctor profiles, department information, and appointment system.',
                'link' => 'https://rgcirc.org',
                'technologies' => ['WordPress', 'PHP', 'MySQL', 'JavaScript', 'Custom Theme'],
                'image' => null,
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'SHAZE E-commerce',
                'description' => 'E-commerce website developed using Laravel and React. Features product catalog, shopping cart, and payment integration.',
                'link' => null,
                'technologies' => ['Laravel', 'React', 'MySQL', 'RESTful API', 'Payment Gateway'],
                'image' => null,
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'name' => 'Vault Energy & Charity Plus Power',
                'description' => 'WordPress-based project with integrated .NET APIs for data synchronization and automation. Energy management and charity platform.',
                'link' => null,
                'technologies' => ['WordPress', '.NET API', 'PHP', 'MySQL', 'API Integration'],
                'image' => null,
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'Online TXT Tools',
                'description' => 'Personal project - online text tools website providing various text manipulation and conversion utilities.',
                'link' => 'https://onlinetxttools.com',
                'technologies' => ['PHP', 'JavaScript', 'HTML5', 'CSS3', 'jQuery'],
                'image' => null,
                'sort_order' => 11,
                'is_active' => true,
            ],
            [
                'name' => 'Diamond Valuer Mobile App Backend',
                'description' => 'Built RESTful APIs and Web Services for Diamond Valuer Android application. Handles diamond valuation algorithms and user data.',
                'link' => null,
                'technologies' => ['PHP', 'RESTful API', 'MySQL', 'JSON', 'Web Services'],
                'image' => null,
                'sort_order' => 12,
                'is_active' => true,
            ]
        ];

        foreach ($projects as $project) {
            PortfolioProject::create($project);
        }
    }
}

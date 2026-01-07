---
title: about
category: Development & Debugging
description: Display information about the current PrestaShop installation
weight: 10
---

# about

{{< minver v="9.1" title="true" >}}

## Description

This command displays information about the current PrestaShop installation. It extends the default Symfony `about` command to include PrestaShop-specific details such as version, debug mode status, and Smarty cache configuration.

## Usage

```bash
php bin/console about
```

## Output

The command displays:
- Standard Symfony project information (PHP version, environment, etc.)
- **PrestaShop** section with:
  - **Version**: Current PrestaShop version (e.g., 9.0.0)
  - **Debug mode**: Whether debug mode is enabled (`true` or `false`)
  - **Smarty Cache**: Whether Smarty template caching is enabled (`true` or `false`)

## Example

```bash
$ php bin/console about

-------------------- ------------------------------------------- 
  Symfony                                                         
 -------------------- ------------------------------------------- 
  Version              6.4.26                                     
  Long-Term Support    Yes                                        
  End of maintenance   11/2026 (in +327 days)                     
  End of life          11/2027 (in +692 days)                     
 -------------------- ------------------------------------------- 
  Kernel                                                          
 -------------------- ------------------------------------------- 
  Type                 AdminKernel                                
  Environment          dev                                        
  Debug                true                                       
  Charset              UTF-8                                      
  Cache directory      ./var/cache/dev/admin (16.7 MiB)           
  Build directory      ./var/cache/dev/admin (16.7 MiB)           
  Log directory        ./var/logs (82 KiB)                        
 -------------------- ------------------------------------------- 
  PHP                                                             
 -------------------- ------------------------------------------- 
  Version              8.4.6                                      
  Architecture         64 bits                                    
  Intl locale          en_US_POSIX                                
  Timezone             Europe/Warsaw (2026-01-07T15:39:24+01:00)  
  OPcache              true                                       
  APCu                 false                                      
  Xdebug               false                                      
 -------------------- ------------------------------------------- 

 -------------- ------- 
  PrestaShop            
 -------------- ------- 
  Version        9.1.0  
  Debug mode     false  
  Smarty Cache   true   
 -------------- ------- 
```

## Use cases

- Quickly check PrestaShop version and configuration
- Verify debug and cache settings
- Troubleshooting environment issues
- Include in support requests or bug reports

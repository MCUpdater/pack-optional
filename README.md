# Optional Pack

This repo contains "optional" client-only mods suitable for inclusion in most
MCU serverpacks. It is maintained by the MCU team and should hopefully serve
as a useful community resource.

If you have a proposed addition to the pack, please contact us on the MCU
Discord server - we're open to suggestions for mods to include in the pack.
But remember, this pack is public and winds up being included in LOTS of different
packs, so a bad update can break people across the community, and nobody wants that.

Obviously, the modlist is different from version to version, and the 1.12 mods are
the most recently updated, but we are willing to update the pack for older MC
versions if there is an appropriate update.

## Howto

Add the following directive to your `<Server/>` directive(s):

```xml
<Import url="https://files.mcupdater.com/optional/ServerPack.xml">optional</Import>
```

As long as you are running one of the following MC versions, the appropriate mods
will be mixed into your pack:
 * 1.7.10
 * 1.10.2
 * 1.12.2

Make sure you aren't manually including any of the optional mods provided here.
If you need to provide a different version of one or need to require one (or want
to block it, etc...), you can `<Override/>` as necessary - just be sure to use the
same mod ID we're using. Multiple copies of the same mod with different ID's are
where 98% of problems here come from.
